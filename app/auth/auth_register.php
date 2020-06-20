<?php
require_once '.../../app/Class.php';

if ( isset( $_POST['submit'] ) ) {

    if ( isset( $_POST['fullname'] ) && isset( $_POST['index_number'] ) && isset( $_POST['program'] )&& isset($_POST['_date']) ) {

        $fullname = trim( $_POST['fullname'] );
        $index_number = trim( $_POST['index_number'] );
        $program = trim( $_POST['program'] );
        $_date = trim($_POST['_date']);

        $user = new Users();
        $user->register( $fullname, $index_number, $program, $_date );

    }
}
?>