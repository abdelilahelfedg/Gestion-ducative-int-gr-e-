<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
     <!-- <img src="/assets/images/imag.jpg" > -->

     <!-- <h2 class="h6">ddddd</h2>
     <h1 class="display-1">display 1 heading</h1>
     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
     <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
     <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
     <p class="text-end">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
     <p class="text-decoration-underline">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
     <p class="text-decoration-line-through">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
     <p class="fw-bold">this is bold text</p>   // font weight 
     <p class="text-primary">theme color</p>
     <p class="text-warning">theme color</p>
     <p class="text-danger">theme color</p>
     <p class="text-secondary">theme color</p>
     <p class="text-white bg-danger">theme color</p>
     <p class="text-info">theme color</p> -->
<!-- 
     <button class="btn btn-warning">Se Connecter</button>
     <a href="#" class="btn btn-danger">Links as Button</a>

     <button class="btn btn-lg btn-primary">large button</button>
     <button class="btn btn-sm btn-primary">small button</button>

     <button class="btn btn-outline-danger">outlined danger button</button>
     <button class="btn btn-outline-success">outlined success button</button> -->

     <!-- margin and padding -->
     <!-- <p class="bg-primary mx-3 py-5">margin in x direction and padding in y direction</p>
     <p class="bg-primary ms-3 pe-5">margin left and padding right</p>
     <p class="bg-primary mt-3 pb-5">margin top and padding bottum</p>
     <p class="m-3 p-3 border-warning border border-3">default border</p>
     <p class="border m-3 p-3 rounded-pill border-start border-bottom border-danger border-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
     <p class="m-3 bg-primary shadow-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>

     <p class="fw-bold">font weigt bold text</p>
     <p class="fw-bolder">font weigt bolder text</p>
     <p>normal text</p>
     <p class="fw-light">font weigt light text</p>
     <p class="fst-italic">font style italic text</p>
     <p class="fst-italic fw-light">font style italic text</p> -->
     
     <!-- containers -->

     <!-- <div class="container">
    
        <h3>titre</h3>
        <div class="row my-3">
            <div class="col-sm-4 bg-primary p-3">col1</div>
            <div class="col-sm-5 bg-danger p-3">col2</div>
            <div class="col-sm-3 bg-warning p-3">col3</div>
        </div>
     </div> -->

     <!-- <div class="container bg-primary">
         <div class="row justify-content-center">
             <div class="col-4">
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                  <div class="card ">
                       <div class="card-body">
                            <div class="card-title">Title</div>
                       </div>
                  </div>
             </div>
         </div>    -->
       
        
    <div class="container-lg bg-primary my-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card bg-light my-5">
                    <div class="card-body">
                        <div class="card-title text-center mb-3">Espace Login</div>
                        <form method="POST">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="Email" id="email" class="form-control" placeholder="Prenom.Nom@xxx.uae.ac.ma" required>
                            
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="mdp" class="form-control" placeholder="Votre Mot de Passe" required>
                            <?php if(!empty($errors)):?>
                                <div class="alert alert-danger">
                                    <?= implode("<br>", $errors)?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-primary my-3">Se connecter</button>
                       </form>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>





















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>