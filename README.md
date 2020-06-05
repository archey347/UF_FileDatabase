# UF_FileDB

This sprinkle allows for files to be linked with other entities in a database. 

The names of all the file are stored in a `files` table, along with an ID, and a few timestamps. 

## Usage


```
use UserFrosting\Sprinkle\FileDB\Database\Models\File;

// Creating a new file

$file = new File();                     // Create model instance

$file->name = "Test.txt";               // Set the filename
$file->save();                          // Save to the database
$file->put("File Contents goes here");  // Now save file to disk

// Get file contents
$file->get();

// Soft Deleting a file

$file->delete()

// Force Deleting (this will remove it from the filesystem)
$file->forceDelete();
```
## Installation

Edit UserFrosting app/sprinkles.json file and add the following to the require list : `"archey347/uf_filedatabase": "^0.0.1"`. Also add `FileDB` to the base list. For example:
```
{
    "require": {
        "archey347/uf_filedatabase": "^0.0.1"
    },
    "base": [
        "core",
        "account",
        "admin",
        "FileDB"
    ]
}
```
Run `composer update` to install the sprinkle.


## Configuration
```
return [
    "fileDB" => [
        "disk" => "local", // This is the name of the UF disk
        "path" => "db"     // This is the path to store all of the files in
    ]
];
```
