<main class="main-footer">
<footer class="footer-principal">
  <div class="menu-secundario">
    <a href="index.php">Home</a>
    <a href="juego.php">¡Jugar!</a>
    <a href="preguntas.php">Preguntas</a>
     @if(isset($_SESSION["email"]))
      <a href="perfil.php">Mi Perfil</a>
    @else
      <a href="registro.php">Registrarse</a>
    @endif


    @if(isset($_SESSION["email"]))
      <a href="logout.php">Desloguearme</a>
    @else
      <a href="login.php">Login</a>
    @endif
  </div>

</footer>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
