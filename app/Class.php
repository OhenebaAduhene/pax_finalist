<?php

Class Users {

    private $limit = 10;

    // Register users

    public function register( $fullname, $index_number, $program, $_date ) {
        include 'config/server.php';

        // checking if email already exist
        $sql = 'SELECT COUNT(index_number) AS num FROM usertable WHERE index_number = ?';

        $stmt = $pdo->prepare( $sql );
        $stmt ->execute( array( $index_number ) );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );

        if ( $row['num'] > 0 ) {
            # code...
            echo "<div class='row'>
					<div class='col-md-4'></div>
					<div class='alert alert-warning alert-dismissible fade show mb-0 col-md-4' role='alert' style='margin-top:5%, align:c'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>×</span>
					</button>
					<i class='fa fa-check mx-2'></i>
						Email already exist </div>
					<div class='col-md-4'></div>
					</div>";
        } else {

            $sql = 'INSERT INTO usertable(fullname, index_number, program, _date ) VALUES (?,?,?, ?)';

            $sql_query = $pdo->prepare( $sql );
            $result = $sql_query->execute( array( $fullname, $index_number, $program, $_date ) );

            if ( $result ) {
                $stmt = $pdo->prepare( 'SELECT * FROM usertable WHERE index_number=?' );
                $stmt->execute( [$index_number] );
                $user = $stmt->fetch( PDO::FETCH_ASSOC );

                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['fullname'] = $fullname;
                $_SESSION['index_number'] = $index_number;

                $_SESSION['program'] = $program;
                $_SESSION['_date'] = $_date;

            } else {

            }

        }

    }
    // End of registration method

    // Controlling user table

    public function user_table() {
        include 'config/server.php';

        $limit = $this->limit;

        if ( isset( $_GET['page'] ) ) {
            $page  = $_GET['page'];

        } else {

            $page = 1;
        }
        ;

        $start_from = ( $page-1 ) * $limit;

        $query = 'SELECT * FROM usertable';
        $stmt = $pdo->query( $query );

        echo '
			<table class="table table-dark">
			<thead class="thead-dark">
			<tr>
			<th scope="col" name="user_id">#</th>
			<th scope="col" name="fullname">Fullname</th>
			<th scope="col" name="index_number">Index Number</th>
			<th scope="col" name="program">Program</th>
			<th scope="col" name="_date">Phone</th>
			</tr>
			</thead>
			';

        while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $user_id = $row['user_id'];
            $fullname = $row['fullname'];
            $index_number = $row['index_number'];
            $program = $row['program'];
            $_date = $row['_date'];

            echo'
				<tbody>
				<tr>
				<th scope="row">'.$user_id.'</th>
				<td>'.$fullname.'</td>
				<td>'.$index_number.'</td>
				<td>'.$program.'</td>
				<td>'.'0'.$_date.'</td>
				</tr>

				</tbody>


				';
        }
        echo '</table>';

        $this->myPagination();
    }
    // End of user table control

    // Table pagination

    private function myPagination() {
        include 'config/server.php';

        $limit = $this->limit;
        $query = 'SELECT COUNT(*) FROM usertable ';

        $stmt = $pdo->query( $query );
        $total_results = $stmt->fetchColumn();

        $total_pages = ceil( $total_results/$limit );

        $pagLink = "<nav><ul class='pagination'>";

        for ( $page = 1; $page <= $total_pages; $page++ ) {

            $pagLink .= "<li class='page-item'><a class = 'page-link' href='index.php?page=".$page."'>" .$page. '</a></li>';

        }
        ;

        echo $pagLink . '</ul></nav>';

    }
    // End of pagination

    public function exportCSV() {
        include 'config/server.php';
        //get records from database
        $query = $pdo->query( 'SELECT * FROM usertable ORDER BY user_id DESC' );

        if ( $query ) {
            $delimiter = ',';
            $filename = 'pax_finalist' . date( 'Y-m-d' ) . '.csv';

            //create a file pointer
            $f = fopen( 'php://memory', 'w' );

            //set column headers
            $fields = array( 'ID', 'Fullname', 'Index Number', 'Program', 'Phone Number' );
            fputcsv( $f, $fields, $delimiter );

            //output each row of the data, format line as csv and write to file pointer
            while( $row = $query->fetch( PDO::FETCH_ASSOC ) ) {
                $lineData = array( $row['user_id'], $row['fullname'], $row['index_number'], $row['program'], $row['_date'] );
                fputcsv( $f, $lineData, $delimiter );
            }

            //move back to beginning of file
            fseek( $f, 0 );

            //set headers to download file rather than displayed
            header( 'Content-Type: text/csv' );
            header( 'Content-Disposition: attachment; filename="' . $filename . '";' );

            //output all remaining data on a file pointer
            fpassthru( $f );
        }
        exit;

    }

}

?>