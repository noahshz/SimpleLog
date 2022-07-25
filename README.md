# SimpleLog

SimpleLog is an easy and simple logger written in PHP. It can be used to log custom messages and it's possible to pass own prefixes.

## ToDo`s

- [ ] Search function to filter prefixes
- [ ] Possibility to load log file in array and work with logs

### Variables:

```php
# defines the path, where the log file is saved
public string $destination

# defines the log file name
public string $filename 
```

### Functions:

```php
# initializes object with default parameter value
__construct() : void
```

```php
# writes a custom message to the log
public write(string $message, array $optional_prefixes = null) : bool
```

```php
# creates the log file
private createFile() : bool
```

```php
# creates the directory where the log file will be saved
private createDirectory() : bool
```

```php
# return the whole log content as string
public getContent() : string
```

```php
# deletes the log file an creates new one
public clear() : bool
```

### Example usage:

```php
$log = new SimpleLog();
$log->destination = "YOUR CUSTOM DESTINATION PATH";
$log->filename = "myfirstlog";

$log->write("Missing Argument on Line 46", ["Error"]);
$log->write("Failed to load ressources", ["Error"]);
$log->write("the cpu temperature is over 70° celcius", ["Warning"]);
$log->write("User ran out of ram", ["Important", "Userxyz"]);

$logcontent = $log->getContent();
echo $logcontent;

$log->clear();

```