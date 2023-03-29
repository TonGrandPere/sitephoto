<?php

require_once 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Specify your connection string and create a blob client instance
$connectionString = "DefaultEndpointsProtocol=https;AccountName=blobeuh;AccountKey=W0xlWcNRbHNGq+FbkXYgHFehIjqeUqFNSSLReiLA26oXxHKixzmz/gaYH7nciLD/D1g1qliCormm+ASt1cniOQ==";
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Specify the container name that you want to list blobs from
$containerName = "images";

try {
    // Get list of all blobs in the container
    $blobList = $blobClient->listBlobs($containerName);

    // Loop through each blob in the list and display its name
    foreach ($blobList->getBlobs() as $blob) {
        echo "Blob name: " . $blob->getName() . "<br>";
    }
} catch (ServiceException $e) {
    echo $e->getMessage();
}
?>
