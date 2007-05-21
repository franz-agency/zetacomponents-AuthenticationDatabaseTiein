<?php
$credentials = new ezcAuthenticationPasswordCredentials( 'jan.modaal', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e' );
$database = new ezcAuthenticationDatabaseInfo( ezcDbInstance::get(), 'users', array( 'user', 'password' ) );
$authentication = new ezcAuthentication( $credentials );
$authentication->addFilter( new ezcAuthenticationDatabaseFilter( $database ) );
if ( !$authentication->run() )
{
    // authentication did not succeed, so inform the user
    $status = $authentication->getStatus();
    $err = array(
             ezcAuthenticationDatabaseFilter::STATUS_USERNAME_INCORRECT => 'Incorrect username',
             ezcAuthenticationDatabaseFilter::STATUS_PASSWORD_INCORRECT => 'Incorrect password'
             );
    for ( $i = 0; $i < count( $status ); $i++ )
    {
        list( $key, $value ) = each( $status[$i] );
        echo $err[$value];
    }
}
else
{
    // authentication succeeded, so allow the user to see his content
}
?>
