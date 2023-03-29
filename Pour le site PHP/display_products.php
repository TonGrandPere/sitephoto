<?php

require_once 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Specify your connection string and create a blob client instance
$connectionString = "DefaultEndpointsProtocol=https;AccountName=<your_account_name>;AccountKey=<your_account_key>";
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Specify the container name that you want to list blobs from
$containerName = "<your_container_name>";

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
