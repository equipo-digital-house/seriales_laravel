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
</html>
