<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Posts
 */
class Posts extends DataLayer
{     
     /**
      * __construct
      *
      * @return void
      */
     function __construct() {
        parent::__construct("posts", [
            "post_head",
            "post_body",
            "categories"
        ], 'id_post', true);
    }

    public function getPartner()
    {
        $partners = (new User)->find("id_user = :pid", "pid={$this->professional}")->fetch(true);
        if ($partners) {
            foreach ($partners as $partner) {
                return $partner->data();
            }
        }else {
            return array(
                'nome' => 'Procurando...',
                'profile_pic' => 'avatar.png'
            );
        }

    }

    public function getUser()
    {
        $users = (new User)->find("id_user = :uid", "uid={$this->creator}")->fetch(true);
        if ($users) {
            foreach ($users as $user) {
                return $user->data();
            }
        }
    }
}