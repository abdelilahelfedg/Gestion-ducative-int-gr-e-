<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
.card-container {  
  width: 350px;
  height: 440px;
  background: transparent;
  position: relative;
}

.container {  
  display: flex;
  height: 100%;
  width: 100%;
  align-items: center;
  justify-content: center;
}

.circle1 { 
  height: 80px;
  width: 80px;
  border-radius: 50%;
  background-color: #ADD8E6;
  position: absolute;
  top: 0;
  left: 80%;
}

.circle2 { 
  height: 80px;
  width: 80px;
  border-radius: 50%;
  background-color: #ADD8E6;
  position: absolute;
  right: 80%;
  bottom: 0;
}

.log-card { 
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  position: absolute;
  width: 400px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  box-shadow: 0 10px 60px rgb(0,0,0);
  backdrop-filter: blur(5px);
  padding: 20px;
}

.heading { 
  font-size: 28px;
  font-weight: 800;
  color: black;
}

.password-group {
  display: flex;
  justify-content: space-between;
  margin-top: 5px;
}

.btn {
  margin-top: 20px;
  margin-bottom: 10px;
  padding: 8px 16px;
  border: none;
  background-color: #ADD8E6;
  color: black;
  font-size: 16px;
  font-weight: 700;
  border-radius: 8px;
}

.btn:hover {
  background-color: #0653c7;
}
.inputGroup {
  font-family: 'Segoe UI', sans-serif;
  margin: 1em 0 1em 0;
  max-width: 190px;
  color: black;
  position: relative;
}

.inputGroup input {
  font-size: 100%;
  padding: 0.8em;
  outline: none;
  border: 2px solid rgb(200, 200, 200);
  background-color: transparent;
  border-radius: 20px;
  color: black;
  width: 100%;
}

.inputGroup :is(input:focus, input:valid)~label {
  margin: 0em;
  margin-left: 1.3em;
  padding: 0.4em;
}

body{
  background-image: url('../public/assets/images/login.png');
  background-size: cover; 
  background-position: center; 
  background-repeat: no-repeat;
}
    </style>
</head>
<body>
                             
<div class="container">
    <div class="card-container">
        <div class="container">
            <div class="log-card">
        <p class="heading">Bienvenue</p>

        <div>
            <form class="container" method="POST">
                <div>
                    <div class="inputGroup">
                      <label for="email">Utilisateur</label>
                        <input required type="text" name="Email" id="email">
                        
                    </div>
                    <div class="inputGroup">
                      <label for="mdp">Mot de passe</label>
                        <input autocomplete="off" required type="password" name="password"  id="mdp">
                        
                    </div>
                    <button class="btn">Entrer</button>
                </div>
                
            </form>
        </div>

        <!-- <div class="password-group">
                <a href="" class="forget-password">Mot de passe oublié?</a>
        </div> -->
        
    </div>
        </div>
       
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>