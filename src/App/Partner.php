<?php
namespace Source\App;
use Source\Models\Hates;
use Source\Models\Posts;
use Source\Models\Support;

class Partner extends Controller 
{
    private $user;

     function __construct($router) {
        $this->user = $_SESSION["user"];
        parent::__construct($router);
    }

    public function getView()
    {
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
        $view = str_replace(
            $comAcentos,
            $semAcentos,
            geturl(
                filter_var($_GET["view"], FILTER_SANITIZE_STRIPPED)
            )
        );
        $this->$view();
    }

    public function inicio()
    {
        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/index");
    }

    public function avaliacoes()
    {
        $hates = (new Hates)->find("id_user_receiving = :pid", "pid={$this->user}")->fetch(true);
        $data = [];

        if (!$hates) {
           $data = null;
        } else {
            foreach ($hates as $hate) {
                $data[] = $hate->data();
            }
        }

        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/hates", [
            "hates" => $data
        ]);

    }

    public function servicos()
    {
        $posts = (new Posts)->find("professional = :p AND status_post = :s", "p={$this->user}&s=ok")->fetch(true);
        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/services", ["posts" => $posts]);
    }


    public function Perfil()
    {
        echo $this->router->redirect('web.error', ["errcode" => "201"]);
    }

    public function Suporte()
    {
        $questions = (new Support)->find("id_user = :id" , "id={$this->user}")->fetch(true);
        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/support", [
            "questions" => $questions
        ]);
    }

}