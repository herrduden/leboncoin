<?php
require_once("Models/Model.php");
    class LoginController{

        private $viewName;
        private $parent;

        public function __construct($viewName=null)
        {
            // Je récupére le nom de la vue que je dois charger...
            $this->viewName = $viewName;
            // Je sais que toujours le dossier qui contiendra les vues et celui Views
            // $this->parent = construit le chemin en auto vers le dossier contenant les views...
            $this->parent = str_replace("\Controllers", "",__DIR__)."\\Views\\";
            // Ici je charge la page en question...
            
            if($this->viewName!=null){
                 $this->loadView();
            }

        }

        public function formvalidation(){
            if(isset($_POST)&& !empty($_POST)){
                //je dois appeler le model 
                $model= new Model();
                $status =$model -> addUser($_POST['username'],$_POST['email'],$_POST["tel"],$_POST['password']);
                if ($status){
                    $GLOBALS['RECORDSTATUS']=true;
                }else{
                    $GLOBALS['RECORDSTATUS']=false;

                }
                header(sprintf('Location: %s%s',$GLOBALS["__HOST__"],"sign-up"));
            }
        }

        
        public function loadView(){
            // Etant donné que notre header( en tête ) ne changera jamais entre les views alors
            require_once($this->parent."commons\\header.php");
            // Ici la page qui va changer
            require_once($this->parent.$this->viewName.".php");
            // Etant donné que notre footer ( pied ) ne changera jamais entrre les pages alors
            require_once($this->parent."commons\\footer.php");
        }

        public function signIn(){

            // Récupérer les infos de connexion...
        }
    }

?>