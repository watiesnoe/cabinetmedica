<!DOCTYPE html>
<html>
    <?php $this->view('common/header')?>
<body class="body_login">
    <div class="wrapper">
    
        <div class="main-panel">
            
            <div class="content">
                
                <div class="page-inner">
                    <div class="">
                    <div class="card  mb-3" style="border: 1px solid #129283;margin-top: 50px;" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="login_form">
                                        <div class="col" align="center">

                                            <img class="" src="<?=ROOT?>/images/logowassa7.png" alt="" width="100">
                                        </div>
                                        <p align="center" style="color:#129283"><b>CONNEXION</b></p>
                                        <form class=""  method="POST" action="">

                                            <div class="d-flex flex-column pb-3">
                                                <label for="pseudo">Identifiant</label>
                                                <input type="text" name="pseudo" id="pseudo" class="border-bottom  form-control "  value=""  autocomplete="pseudo" placeholder="Votre nom d'utilisateur" autofocus>
                                            </div>

                                            <div class="d-flex flex-column pb-3">
                                                <label for="password">Mot de passe</label>
                                                <input type="password" name="password" id="password" class="border-bottom border form-control value="placeholder="Mot de passe"  autocomplete="current-password">

                                                <span class="invalid-feedback" role="alert">
                                                    <b></b>
                                                </span>
                                            </div>
                                            <div class="d-flex jusity-content-end pb-4">
                                            </div> <input type="submit" value="Se connecter" name="submit" class="btn btn-info btn-block mb-3" style="background-color: #129283;">
                                        </form>
                                        <?php $this->view('common/_flash')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                </div>

            </div>
            <?php $this->view('common/footer'); ?>
        </div>
        <!-- End Custom template -->

    </div>
</body>
</html>