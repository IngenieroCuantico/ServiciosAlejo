<?php
include 'functions.php';

$pdo = pdo_connect_mysql();

$msg = '';

// Checkea que los datos del POST no esten vacios

if (!empty($_POST)) {
    // Si no esta vacio ingresa un nuevo registro
    
    //COnfiguras las variables que estan sugeriendo ser insertadas, el POST variables existen nosotros podemos  dejar por defecto la pagina

    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_PST['id'] : NULL;

    
    //checkea si la variables POST nombre existe, si no existe queda por defecto la pagina
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    // Insertando nuevo registro en la tabñla CONTACTS
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');

    $stmt->execute([$id, $name, $email, $phone, $title, $created]);
    //Produccion (OUTPUT) Del Mensaje
    $msg = 'Creado Satisfactoriamente';
}
?>


<?= template_header('Creacion') ?>

<div class="content update">

	<h2>Crear Contacto</h2>

    <!--Formulario-->
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Nombre</label>
        <input type="text" name="id" placeholder="26" value="Automatica Identificacion" id="id">
        <input type="text" name="name" placeholder="Juanito Perez" id="name">
        <label for="email">Email</label>
        <label for="phone">Telefono</label>
        <input type="text" name="email" placeholder="nn@ejemplo.com" id="email">
        <input type="text" name="phone" placeholder="000000000" id="phone">
        <label for="title">Titulo</label>
        <label for="created">Creacion</label>
        <input type="text" name="title" placeholder="Empleado" id="title">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
    </form>

            <?php if ($msg): ?>

                <p><?=$msg?></p>

            <?php endif; ?>

</div>

<?= template_footer() ?>