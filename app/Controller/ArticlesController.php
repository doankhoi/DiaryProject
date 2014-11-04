<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticlesController
 *
 * @author doankhoi
 */
class ArticlesController extends AppController {

    var $name = "Articles";
    var $uses = array('Article', 'User');
    var $paginate = array();
    
    /**
     * Hàm xem thông tin chi tiết một bài viết
     */
    public function view($id) {
        
    }

    /**
     * Hàm tìm mã id của chủ nhân của bài viết có mã id
     */
    public function getIdOwner($articles_id) {
        $article = $this->Article->find('first', array(
            'fields' => array('users_id'),
            'conditions' => array(
                'Article.id' => $articles_id
            )
        ));
        return $article['Article']['users_id'];
    }

    /**
     * Hàm tìm tiêu đề bài viết 
     */
    public function getTitle($id) {
        return $this->Article->find('first', array(
                    'fields' => array('Article.title'),
                    'conditions' => array(
                        'id' => $id
                    )
        ));
    }

    /**
     * Hàm tìm kiếm bài viết
     */
    public function search() {     
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $title = $_POST['key'];
        $id = $this->Auth->user('id');

        $list = $this->Article->find('all', array(
            'fields' => array('id', 'title', 'content'),
            'conditions' => array(
                'users_id' => $id
            )
        ));

        //Chuyen sang tieng viet khong dau
        $title = $this->convert_vi_to_en($title);
        //Chuyển sang kí tự thường
        $title = strtolower($title);

        $articles = array();

        foreach ($list as $item) {
            $y = $item['Article']['title'];
            $y = $this->convert_vi_to_en($y);
            $y = strtolower($y);

            if (strstr($y, $title) != false) {
                $item['Article']['content'] = $this->splitCharater($item['Article']['content']);
                $articles[] = $item['Article'];
            }
        }
               
        return json_encode($articles);

    }

    /**
     * Hàm chuyển đổi tiếng việt không dấu
     * @param type $str
     * @return type
     */
    function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        //$str = str_replace(” “, “-”, str_replace(“&*#39;”,”",$str));

        return $str;
    }

    function splitCharater($str) {
        if (count(explode(' ', $str)) <= 300)
            return $str;

        $result = explode(' ', $str);

        return implode(' ', array_slice($result, 0, 300));
    }

    //Đếm danh sách các bài viết theo tháng
    public function countArticleWithMonth(){
        $id = $this->Auth->user('id');
        
        $articles = $this->Article->find('all',array(
           'conditions'=> array(
               'users_id'=>$id              
           ),
            'order'=>'Article.created desc',
            'group'=> array('Article.subjects_id')
        ));
        
        return $articles;
    }
}
