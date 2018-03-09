<!DOCTYPE html>
<html lang="fr">
<head>
      <title> <?php echo $title; ?> </title>
      <link rel="stylesheet" type="text/css" href = " <?php echo '/phpMVC1/public/css/bootstrap.css'; ?>"/>
      <link rel="stylesheet" type="text/css" href = " <?php echo '/phpMVC1/public/css/style.css'; ?>"/>

      
  </head>
  <body>  
 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="nav justify-content-end">
  <li class="nav-item">
      <a class="nav-link"  href="/phpMVC1/accueil" role="tab" aria-controls="pills-contact" aria-selected="false">Accueil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="/phpMVC1/fiche" role="tab" aria-controls="pills-home" aria-selected="true">Fiche</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="/phpMVC1/categorie" role="tab" aria-controls="pills-profile" aria-selected="false">Categorie</a>
    </li>
    
  </ul>  
</nav>
<div class="content" id="pills-tabContent" >
  <?php echo $content ?>
</div>
<script type="text/javascript" src="/phpMVC1/public/js/jquery.js"></script>
<script type="text/javascript" src="/phpMVC1/public/js/bootstrap.js"></script>

<script type="text/javascript">
  $('#deleteModal').on('shown.bs.modal', function () {
    $('.content').trigger('focus')
  })
</script>


<p class="footer"></p>
</body>


</html>
