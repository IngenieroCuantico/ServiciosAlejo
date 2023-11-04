<?php

include 'functions.php';

$pdo = pdo_connect_mysql();

$msg = '';

// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted

    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');

    $stmt->execute([$_GET['id']]);

    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        exit('Contacto no existe con ese ID');
    }
    // Make sure the user confirms beore deletion
    
    
    if (isset($_GET['confirm'])) {

        if ($_GET['confirm'] == 'yes') {

            // Usuario Clickea pra la confirmacion de eliminacion

            $stmt = $pdo->prepare('DELETE FROM contacts WHERE id = ?');

            $stmt->execute([$_GET['id']]);

            $msg = 'Has Eliminado Satisfactoriamente El Contacto';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            //usuario clickea el boton "NO" redirecciona a la pagina anterior a la read.php
            header('Location: read.php');
            exit;
        }
    }
    
} else {

    exit('Id No Especificada!');
}
?>

<?= template_header('Eliminar')?>

<div class="content delete">
	
<h2>Eliminar Contacto #<?=$contact['id']?></h2>
    
    <?php if ($msg): ?>

    <p><?=$msg?></p>

    <?php else: ?>

	<p>esta seguro de eliminar el contacto #<?=$contact['id']?>?</p>
    
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">Si</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">No</a>
    </div>

    <?php endif; ?>

</div>

<?=template_footer()?>