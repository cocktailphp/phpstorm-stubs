<?php
/*
 * Mongo extension stubs
 * Gathered from http://www.php.net/manual/en/book.mongo.php
 * Maintainer: Alexander Makarov, sam@rmcreative.ru, max@upgradeyour.com
 *
 * MongoClient: https://github.com/djsipe/PHP-Stubs
 */

/**
 * A connection between PHP and MongoDB. This class is used to create and manage connections
 * See MongoClient::__construct() and the section on connecting for more information about creating connections.
 * @link http://www.php.net/manual/en/class.mongoclient.php
 */
class MongoClient
{
    const VERSION = '3.x';
    const DEFAULT_HOST = "localhost" ;
    const DEFAULT_PORT = 27017 ;
    const RP_PRIMARY = "primary" ;
    const RP_PRIMARY_PREFERRED = "primaryPreferred" ;
    const RP_SECONDARY = "secondary" ;
    const RP_SECONDARY_PREFERRED = "secondaryPreferred" ;
    const RP_NEAREST = "nearest" ;

    /* Properties */
    public $connected = FALSE ;
    public $status = NULL ;
    protected $server = NULL ;
    protected $persistent = NULL ;

    /* Methods */
    /**
     * Constructor
     * @param string $server
     * @param array $options
     */
    public function __construct ($server = "mongodb://localhost:27017", $options = array("connect" => TRUE))
    {}

    /**
     * Close
     * Forcefully closes a connection to the database, even if persistent connections are being used. You should never
     * have to do this under normal circumstances.
     * @param bool|string $connection
     * @return bool
     */
    public function close ($connection)
    {}

    /**
     * Connect
     * @return bool
     */
    public function connect ()
    {}

    /**
     * Drop DB
     * @param mixed $db
     * @return array
     */
    public function dropDB ($db)
    {}

    /**
     * Magic database getter
     * @param string $dbname
     * @return MongoDB
     */
    public function __get ($dbname)
    {}

    /**
     * Get connections
     * Returns an array of all open connections, and information about each of the servers
     * @static
     * @return array
     */
    static public function getConnections ()
    {}

    /**
     * Get hosts
     * This method is only useful with a connection to a replica set. It returns the status of all of the hosts in the
     * set. Without a replica set, it will just return an array with one element containing the host that you are
     * connected to.
     * @return array
     */
    public function getHosts ()
    {}

    /**
     * Get read preference
     * Get the read preference for this connection
     * @return array
     */
    public function getReadPreference ()
    {}

    /**
     * List databases
     * @return array
     */
    public function listDBs ()
    {}

    /**
     * Select collection
     * Gets a database collection
     * @param string $db The database name
     * @param string $collection The collection name
     * @return MongoCollection
     */
    public function selectCollection ($db, $collection)
    {}

    /**
     * Select database
     * @param string $name
     * @return MongoDB
     */
    public function selectDB ($name)
    {}

    /**
     * Set read preference
     * @param string $readPreference
     * @param array $tags
     * @return bool
     */
    public function setReadPreference ($readPreference, $tags=null)
    {}

    /**
     * Magic to string method
     * @return string
     */
    public function __toString ()
    {}
}

/**
 * The connection point between MongoDB and PHP.
 * This class is used to initiate a connection and for database server commands.
 * @link http://www.php.net/manual/en/class.mongo.php
 * @deprecated This class has been DEPRECATED as of version 1.3.0.
 * Relying on this feature is highly discouraged. Please use MongoClient instead.
 * @see MongoClient
 */
class Mongo {
	/**
     * @link http://php.net/manual/en/class.mongo.php#mongo.constants.version
	 * PHP driver version. May be suffixed with "+" or "-" if it is in-between versions.
	 */
    const VERSION = '1.0.4+';


	/**
	 * @link http://php.net/manual/en/class.mongo.php#mongo.constants.default-host
     * Host to connect to if no host is given.
	 */
    const DEFAULT_HOST = 'localhost';

	/**
	 * @link http://php.net/manual/en/class.mongo.php#mongo.constants.default-port
     * Port to connect to if no port is given.
	 */
    const DEFAULT_PORT = 27017;


    /**
     * @link http://php.net/manual/en/class.mongo.php#mongo.props.connected
     * @var $connected boolean
     */
    public $connected = false;


    /**
     * @link http://php.net/manual/en/class.mongo.php#mongo.props.status
     * @var $status
     */
    public $status;


    /**
     * @link http://php.net/manual/en/class.mongo.php#mongo.props.server
     * @var $server
     */
    protected $server;

    /**
     * @link http://php.net/manual/en/class.mongo.php#mongo.props.persistent
     * @var $persistent
     */
    protected $persistent = false;

    /**
	 * Creates a new database connection object
	 *
	 * @param string $server The server name.
	 * @param array $options An array of options for the connection. Currently
     *        available options include: "connect" If the constructor should connect before
     *        returning. Default is true. "timeout" For how long the driver should try to
     *        connect to the database (in milliseconds). "replicaSet" The name of the replica
     *        set to connect to. If this is given, the master will be determined by using the
     *        ismaster database command on the seeds, so the driver may end up connecting to a
     *        server that was not even listed. See the replica set example below for details.
     *        "username" The username can be specified here, instead of including it in the
     *        host list. This is especially useful if a username has a ":" in it. This
     *        overrides a username set in the host list. "password" The password can be
     *        specified here, instead of including it in the host list. This is especially
     *        useful if a password has a "@" in it. This overrides a password set in the host
     *        list. "db" The database to authenticate against can be specified here, instead
     *        of including it in the host list. This overrides a database given in the host
     *        list
	 * @link http://php.net/manual/en/mongo.construct.php
	 *
	 * @throws MongoConnectionException
	 * @return Mongo A new database connection object.
	 */
    public function __construct($server = "mongodb://localhost:27017", array $options = array("connect" => TRUE)) {}

   /**
	* Connects to a database server
	*
	* @link http://www.php.net/manual/en/mongo.connect.php
	*
	* @throws MongoConnectionException
    * @return boolean If the connection was successful.
    */
    public function connect() {}

   /**
	* Connects to paired database server
	* @deprecated Pass a string of the form "mongodb://server1,server2" to the constructor instead of using this method.
	* @link http://www.php.net/manual/en/mongo.pairconnect.php
	* @throws MongoConnectionException
    * @return boolean
    */
    public function pairConnect() {}

    /**
	 * Creates a persistent connection with a database server
	 * @link http://www.php.net/manual/en/mongo.persistconnect.php
	 * @deprecated Pass array("persist" => $id) to the constructor instead of using this method.
	 * @param string $username A username used to identify the connection.
	 * @param string $password A password used to identify the connection.
	 * @throws MongoConnectionException
	 * @return boolean If the connection was successful.
	 */
    public function persistConnect($username = "", $password = "") {}

    /**
	 * Creates a persistent connection with paired database servers
	 * @deprecated Pass "mongodb://server1,server2" and array("persist" => $id) to the constructor instead of using this method.
	 * @link http://www.php.net/manual/en/mongo.pairpersistconnect.php
	 * @param string $username A username used to identify the connection.
	 * @param string $password A password used to identify the connection.
	 * @throws MongoConnectionException
	 * @return boolean If the connection was successful.
	 */
    public function pairPersistConnect($username = "", $password = "") {}

   /**
	* Connects with a database server
	*
	* @link http://www.php.net/manual/en/mongo.connectutil.php
	* @throws MongoConnectionException
    * @return boolean If the connection was successful.
    */
    protected function connectUtil() {}

   /**
	* String representation of this connection
	* @link http://www.php.net/manual/en/mongo.tostring.php
    * @return string Returns hostname and port for this connection.
    */
    public function __toString() {}

   /**
	* Gets a database
	*
	* @link http://www.php.net/manual/en/mongo.get.php
    * @param string $name The database name.
	* @throws Exception
    * @return MongoDB
    */
    public function __get($name) {}

    /**
	 * Gets a database
	 * @link http://www.php.net/manual/en/mongo.selectdb.php
	 * @param string $dbname The database name.
	 * @throws InvalidArgumentException
	 * @return MongoDB Returns a new db object.
	 */
    public function selectDB($dbname) {}

    /**
	 * Gets a database collection
	 * @link http://www.php.net/manual/en/mongo.selectcollection.php
	 * @param string|MongoDB $db The database name.
	 * @param string $collection The collection name.
	 * @throws InvalidArgumentException
	 * @return MongoCollection Returns a new collection object.
	 */
    public function selectCollection($db, $collection) {}

    /**
	 * Drops a database
	 *
	 * @link http://www.php.net/manual/en/mongo.dropdb.php
	 * @param mixed $db The database to drop. Can be a MongoDB object or the name of the database.
	 * @return array The database response.
	 */
    public function dropDB($db) {}

   /**
	* Check if there was an error on the most recent db operation performed
	* @deprecated Use MongoDB::lastError() instead.
	* @link http://www.php.net/manual/en/mongo.lasterror.php
    * @return array|null Returns the error, if there was one, or NULL.
    */
    public function lastError() {}

   /**
	* Checks for the last error thrown during a database operation
	* @deprecated Use MongoDB::prevError() instead.
	* @link http://www.php.net/manual/en/mongo.preverror.php
    * @return array Returns the error and the number of operations ago it occurred.
    */
    public function prevError() {}

   /**
	* Clears any flagged errors on the connection
	* @deprecated Use MongoDB::resetError() instead.
	* @link http://www.php.net/manual/en/mongo.reseterror.php
    * @return array Returns the database response.
    */
    public function resetError() {}

   /**
	* Creates a database error on the database.
	* @deprecated Use MongoDB::forceError() instead.
	* @link http://www.php.net/manual/en/mongo.forceerror.php
    * @return boolean The database response.
    */
    public function forceError() {}

   /**
	* Lists all of the databases available
	* @link http://www.php.net/manual/en/mongo.listdbs.php
    * @return array Returns an associative array containing three fields. The first field is databases, which in turn contains an array. Each element of the array is an associative array corresponding to a database, giving the database's name, size, and if it's empty. The other two fields are totalSize (in bytes) and ok, which is 1 if this method ran successfully.
    */
    public function listDBs() {}

    /**
	 * Closes this database connection
	 *
	 * This method does not need to be called, except in unusual circumstances.
	 * The driver will cleanly close the database connection when the Mongo object goes out of scope.
	 *
	 * @link http://www.php.net/manual/en/mongo.close.php
	 *
	 * @return boolean If the connection was successfully closed.
	 */
    public function close() {}
}

/**
 * Instances of this class are used to interact with a database.
 * @link http://www.php.net/manual/en/class.mongodb.php
 */
class MongoDB {
	/**
	 * Profiling is off.
     * @link http://php.net/manual/en/class.mongodb.php#mongodb.constants.profiling-off
	 */
    const PROFILING_OFF = 0;

	/**
	 * Profiling is on for slow operations (>100 ms).
     * @link http://php.net/manual/en/class.mongodb.php#mongodb.constants.profiling-slow
	 */
    const PROFILING_SLOW = 1;

	/**
	 * Profiling is on for all operations.
     * @link http://php.net/manual/en/class.mongodb.php#mongodb.constants.profiling-on
	 */
    const PROFILING_ON = 2;

	/**
	 * Creates a new database
	 * This method is not meant to be called directly. The preferred way to create an instance of MongoDB is through Mongo::__get() or Mongo::selectDB().
	 * @link http://www.php.net/manual/en/mongodb.construct.php
	 * @param Mongo $conn Database connection.
	 * @param string $name Database name.
	 * @throws Exception
	 * @return MongoDB
	 */
    public function __construct(Mongo $conn, $name) {}

   /**
	* The name of this database
	* @link http://www.php.net/manual/en/mongodb.--tostring.php
    * @return string Returns this database's name.
    */
    public function __toString() {}

    /**
	* Gets a collection
	* @link http://www.php.net/manual/en/mongodb.get.php
    * @param string $name The name of the collection.
    * @return MongoCollection
    */
    public function __get($name) {}

    /**
	 * Fetches toolkit for dealing with files stored in this database
	 * @link http://www.php.net/manual/en/mongodb.getgridfs.php
	 * @param string $prefix The prefix for the files and chunks collections.
	 * @return MongoGridFS Returns a new gridfs object for this database.
	 */
    public function getGridFS($prefix = "fs") {}

   /**
	* Gets this database's profiling level
	* @link http://www.php.net/manual/en/mongodb.getprofilinglevel.php
    * @return int Returns the profiling level.
    */
    public function getProfilingLevel() {}

    /**
	 * Sets this database's profiling level
	 * @link http://www.php.net/manual/en/mongodb.setprofilinglevel.php
	 * @param int $level Profiling level.
	 * @return int Returns the previous profiling level.
	 */
    public function setProfilingLevel($level) {}

   /**
	* Drops this database
	* @link http://www.php.net/manual/en/mongodb.drop.php
    * @return array Returns the database response.
    */
    public function drop() {}

    /**
	 * Repairs and compacts this database
	 * @link http://www.php.net/manual/en/mongodb.repair.php
	 * @param bool $preserve_cloned_files If cloned files should be kept if the repair fails.
	 * @param bool $backup_original_files If original files should be backed up.
	 * @return array Returns db response.
	 */
    public function repair($preserve_cloned_files = FALSE, $backup_original_files = FALSE) {}

    /**
	 * Gets a collection
	 * @link http://www.php.net/manual/en/mongodb.selectcollection.php
	 * @param string $name
	 * @return MongoCollection
	 */
    public function selectCollection($name) {}


	/**
	 * Creates a collection
	 * @link http://www.php.net/manual/en/mongodb.createcollection.php
	 * @param string $name The name of the collection.
	 * @param bool $capped If the collection should be a fixed size.
	 * @param int $size If the collection is fixed size, its size in bytes.
	 * @param int $max If the collection is fixed size, the maximum number of elements to store in the collection.
	 * @return MongoCollection
	 */
    public function createCollection($name, $capped = FALSE, $size = 0, $max = 0) {}

    /**
	 * Drops a collection
	 * @link http://www.php.net/manual/en/mongodb.dropcollection.php
	 * @param MongoCollection|string $coll MongoCollection or name of collection to drop.
	 * @return array Returns the database response.
	 */
    public function dropCollection($coll) {}

   /**
	* Get a list of collections in this database
	* @link http://www.php.net/manual/en/mongodb.listcollections.php
    * @return array Returns a list of MongoCollections.
    */
    public function listCollections() {}

    /**
	 * Creates a database reference
	 * @link http://www.php.net/manual/en/mongodb.createdbref.php
	 * @param string $collection The collection to which the database reference will point.
	 * @param mixed $a Object or _id to which to create a reference. If an object or associative array is given, this will create a reference using the _id field.
	 * @return array Returns a database reference array.
	 */
    public function createDBRef($collection, $a) {}


	/**
	 * Fetches the document pointed to by a database reference
	 * @link http://www.php.net/manual/en/mongodb.getdbref.php
	 * @param array $ref A database reference.
	 * @return array Returns the document pointed to by the reference.
	 */
    public function getDBRef(array $ref) {}

    /**
	 * Runs JavaScript code on the database server.
	 * @link http://www.php.net/manual/en/mongodb.execute.php
	 * @param MongoCode|string $code Code to execute.
	 * @param array $args Arguments to be passed to code.
	 * @return array Returns the result of the evaluation.
	 */
    public function execute($code, array $args = array()) {}

    /**
	 * Execute a database command
	 * @link http://www.php.net/manual/en/mongodb.command.php
	 * @param array $data The query to send.
	 * @return array Returns database response.
	 */
    public function command(array $data) {}

   /**
	* Check if there was an error on the most recent db operation performed
	* @link http://www.php.net/manual/en/mongodb.lasterror.php
    * @return array Returns the error, if there was one.
    */
    public function lastError() {}

   /**
	* Checks for the last error thrown during a database operation
	* @link http://www.php.net/manual/en/mongodb.preverror.php
    * @return array Returns the error and the number of operations ago it occurred.
    */
    public function prevError() {}

   /**
	* Clears any flagged errors on the database
	* @link http://www.php.net/manual/en/mongodb.reseterror.php
    * @return array Returns the database response.
    */
    public function resetError() {}

    /**
	 * Creates a database error
	 * @link http://www.php.net/manual/en/mongodb.forceerror.php
	 * @return boolean Returns the database response.
	 */
    public function forceError() {}

    /**
	 * Log in to this database
	 *
	 * @link http://www.php.net/manual/en/mongodb.authenticate.php
	 * @param string $username The username.
	 * @param string $password The password (in plaintext).
	 * @return array Returns database response. If the login was successful, it will return 1.
     *         If something went wrong, it will return 0, "errmsg" => "auth fails"
     *         ("auth fails" could be another message, depending on database version and
     *         what went wrong)
	 */
    public function authenticate($username, $password) {}
}

/**
 * Represents a database collection.
 * @link http://www.php.net/manual/en/class.mongocollection.php
 */
class MongoCollection {
     /**
     * @link http://php.net/manual/en/class.mongocollection.php#mongocollection.constants.ascending
     */
    const ASCENDING = 1;

     /**
     * @link http://php.net/manual/en/class.mongocollection.php#mongocollection.constants.descending
     */
    const DESCENDING = -1;

	/**
	 * @var MongoDB
	 */
	public $db = NULL ;

    /**
	 * Creates a new collection
	 * @link http://www.php.net/manual/en/mongocollection.construct.php
	 * @param MongoDB $db Parent database.
	 * @param string $name Name for this collection.
	 * @throws Exception
	 * @return MongoCollection
	 */
    public function __construct(MongoDB $db, $name) {}

   /**
	* String representation of this collection
	* @link http://www.php.net/manual/en/mongocollection.--tostring.php
    * @return string Returns the full name of this collection.
    */
    public function __toString() {}

	/**
	 * Gets a collection
	 * @link http://www.php.net/manual/en/mongocollection.get.php
	 * @param string $name The next string in the collection name.
	 * @return MongoCollection
	 */
    public function __get($name) {}

    /**
	 * Returns this collection's name
	 * @link http://www.php.net/manual/en/mongocollection.getname.php
	 * @return string
	 */
    public function getName() {}

   /**
	* Drops this collection
	* @link http://www.php.net/manual/en/mongocollection.drop.php
    * @return array Returns the database response.
    */
    public function drop() {}

    /**
	 * Validates this collection
	 * @link http://www.php.net/manual/en/mongocollection.validate.php
	 * @param bool $scan_data Only validate indices, not the base collection.
	 * @return array Returns the database's evaluation of this object.
	 */
    public function validate($scan_data = FALSE) {}

    /**
	 * Inserts an array into the collection
	 * @link http://www.php.net/manual/en/mongocollection.insert.php
	 * @param array|object $a An array or object. If an object is used, it may not have protected or private properties.
     * Note: If the parameter does not have an _id key or property, a new MongoId instance will be created and assigned to it.
     * This special behavior does not mean that the parameter is passed by reference.
	 * @param array $options Options for the insert.
     * <dl>
     * <dt>"w"
     * <dd>See WriteConcerns. The default value for MongoClient is 1.
     * <dt>"fsync"
     * <dd>Boolean, defaults to FALSE. Forces the insert to be synced to disk before returning success. If TRUE, an acknowledged insert is implied and will override setting w to 0.
     * <dt>"timeout"
     * <dd>Integer, defaults to MongoCursor::$timeout. If "safe" is set, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a MongoCursorTimeoutException will be thrown.
     * <dt>"safe"
     * <dd>Deprecated. Please use the WriteConcern w option.
     * </dl>
	 * @throws MongoException if the inserted document is empty or if it contains zero-length keys. Attempting to insert an object with protected and private properties will cause a zero-length key error.
	 * @throws MongoCursorException if the "w" option is set and the write fails.
	 * @throws MongoCursorTimeoutException if the "w" option is set to a value greater than one and the operation takes longer than MongoCursor::$timeout milliseconds to complete. This does not kill the operation on the server, it is a client-side timeout. The operation in MongoCollection::$wtimeout is milliseconds.
	 * @return bool|array Returns an array containing the status of the insertion if the "w" option is set.
     * Otherwise, returns TRUE if the inserted array is not empty (a MongoException will be thrown if the inserted array is empty).
	 * If an array is returned, the following keys may be present:
     * <dl>
     * <dt>ok
     * <dd>This should almost be 1 (unless last_error itself failed).
     * <dt>err
     * <dd>If this field is non-null, an error occurred on the previous operation. If this field is set, it will be a string describing the error that occurred.
     * <dt>code
     * <dd>If a database error occurred, the relevant error code will be passed back to the client.
     * <dt>errmsg
     * <dd>This field is set if something goes wrong with a database command. It is coupled with ok being 0. For example, if w is set and times out, errmsg will be set to "timed out waiting for slaves" and ok will be 0. If this field is set, it will be a string describing the error that occurred.
     * <dt>n
     * <dd>If the last operation was an update, upsert, or a remove, the number of documents affected will be returned. For insert operations, this value is always 0.
     * <dt>wtimeout
     * <dd>If the previous option timed out waiting for replication.
     * <dt>waited
     * <dd>How long the operation waited before timing out.
     * <dt>wtime
     * <dd>If w was set and the operation succeeded, how long it took to replicate to w servers.
     * <dt>upserted
     * <dd>If an upsert occurred, this field will contain the new record's _id field. For upserts, either this field or updatedExisting will be present (unless an error occurred).
     * <dt>updatedExisting
     * <dd>If an upsert updated an existing element, this field will be true. For upserts, either this field or upserted will be present (unless an error occurred).
	 * </dl>
     */
    public function insert($a, array $options = array()) {}

    /**
	 * Inserts multiple documents into this collection
	 * @link http://www.php.net/manual/en/mongocollection.batchinsert.php
	 * @param array $a An array of arrays.
	 * @param array $options Options for the inserts.
	 * @throws MongoCursorException
	 * @return mixed f "safe" is set, returns an associative array with the status of the inserts ("ok") and any error that may have occured ("err"). Otherwise, returns TRUE if the batch insert was successfully sent, FALSE otherwise.
	 */
    public function batchInsert(array $a, array $options = array()) {}

    /**
	 * Update records based on a given criteria
	 * @link http://www.php.net/manual/en/mongocollection.update.php
	 * @param array $criteria Description of the objects to update.
	 * @param array $newobj The object with which to update the matching records.
     * @param array $options This parameter is an associative array of the form
     *        array("optionname" => boolean, ...).
     *
     *        Currently supported options are:
     *          "upsert": If no document matches $$criteria, a new document will be created from $$criteria and $$new_object (see upsert example).
     *
     *          "multiple": All documents matching $criteria will be updated. MongoCollection::update has exactly the opposite behavior of MongoCollection::remove- it updates one document by
     *          default, not all matching documents. It is recommended that you always specify whether you want to update multiple documents or a single document, as the
     *          database may change its default behavior at some point in the future.
     *
     *          "safe" Can be a boolean or integer, defaults to false. If false, the program continues executing without waiting for a database response. If true, the program will wait for
     *          the database response and throw a MongoCursorException if the update did not succeed. If you are using replication and the master has changed, using "safe" will make the driver
     *          disconnect from the master, throw and exception, and attempt to find a new master on the next operation (your application must decide whether or not to retry the operation on the new master).
     *          If you do not use "safe" with a replica set and the master changes, there will be no way for the driver to know about the change so it will continuously and silently fail to write.
     *          If safe is an integer, will replicate the update to that many machines before returning success (or throw an exception if the replication times out, see wtimeout).
     *          This overrides the w variable set on the collection.
     *
     *         "fsync": Boolean, defaults to false. Forces the update to be synced to disk before returning success. If true, a safe update is implied and will override setting safe to false.
     *
     *         "timeout" Integer, defaults to MongoCursor::$timeout. If "safe" is set, this sets how long (in milliseconds) for the client to wait for a database response. If the database does
     *         not respond within the timeout period, a MongoCursorTimeoutException will be thrown
	 * @throws MongoCursorException
	 * @return boolean
	 */
    public function update(array $criteria , array $newobj, array $options = array()) {}

    /**
	 * Remove records from this collection
	 * @link http://www.php.net/manual/en/mongocollection.remove.php
	 * @param array $criteria Description of records to remove.
	 * @param array $options Options for remove.
	 * @throws MongoCursorException
	 * @return mixed
	 */
    public function remove(array $criteria, array $options = array()) {}

    /**
	 * Querys this collection
	 * @link http://www.php.net/manual/en/mongocollection.find.php
	 * @param array $query The fields for which to search.
	 * @param array $fields Fields of the results to return.
	 * @return MongoCursor
	 */
    public function find(array $query = array(), array $fields = array()) {}

    /**
         * Retrieve a list of distinct values for the given key across a collection
         * @link http://www.php.net/manual/ru/mongocollection.distinct.php
         * @param string $key The key to use.
         * @param array $query An optional query parameters
         */
    public function distinct (string $key, array $query = NULL) {}

    /**
    	 * Update a document and return it
    	 * @link http://www.php.net/manual/ru/mongocollection.findandmodify.php
    	 * @param array $query The query criteria to search for.
    	 * @param array $update The update criteria.
    	 * @param array $fields Optionally only return these fields.
    	 * @param array $options An array of options to apply, such as remove the match document from the DB and return it.
    	 * @return Returns the original document, or the modified document when new is set.
         */
    public function findAndModify (array $query, array $update = NULL, array $fields = NULL, array $options = NULL) {}

    /**
	 * Querys this collection, returning a single element
	 * @link http://www.php.net/manual/en/mongocollection.findone.php
	 * @param array $query The fields for which to search.
	 * @param array $fields Fields of the results to return.
	 * @return array|null
	 */
    public function findOne(array $query = array(), array $fields = array()) {}

    /**
	 * Creates an index on the given field(s), or does nothing if the index already exists
	 * @link http://www.php.net/manual/en/mongocollection.ensureindex.php
	 * @param array $keys Field or fields to use as index.
	 * @param array $options [optional] This parameter is an associative array of the form array("optionname" => <boolean>, ...).
	 * @return boolean always true
	 */
    public function ensureIndex(array $keys, array $options = array()) {}

    /**
	 * Deletes an index from this collection
	 * @link http://www.php.net/manual/en/mongocollection.deleteindex.php
	 * @param string|array $keys Field or fields from which to delete the index.
	 * @return array Returns the database response.
	 */
    public function deleteIndex($keys) {}

   /**
	* Delete all indexes for this collection
	* @link http://www.php.net/manual/en/mongocollection.deleteindexes.php
    * @return array Returns the database response.
    */
    public function deleteIndexes() {}

    /**
	 * Returns an array of index names for this collection
	 * @link http://www.php.net/manual/en/mongocollection.getindexinfo.php
	 * @return array Returns a list of index names.
	 */
    public function getIndexInfo() {}

    /**
	 * Counts the number of documents in this collection
	 * @link http://www.php.net/manual/en/mongocollection.count.php
	 * @param array|stdClass $query
	 * @return int Returns the number of documents matching the query.
	 */
    public function count($query = array()) {}

    /**
	 * Saves an object to this collection
	 * @link http://www.php.net/manual/en/mongocollection.save.php
	 * @param array|object $a Array to save. If an object is used, it may not have protected or private properties.
     * Note: If the parameter does not have an _id key or property, a new MongoId instance will be created and assigned to it.
     * See MongoCollection::insert() for additional information on this behavior.
	 * @param array $options Options for the save.
     * <dl>
     * <dt>"w"
     * <dd>See WriteConcerns. The default value for MongoClient is 1.
     * <dt>"fsync"
     * <dd>Boolean, defaults to FALSE. Forces the insert to be synced to disk before returning success. If TRUE, an acknowledged insert is implied and will override setting w to 0.
     * <dt>"timeout"
     * <dd>Integer, defaults to MongoCursor::$timeout. If "safe" is set, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a MongoCursorTimeoutException will be thrown.
     * <dt>"safe"
     * <dd>Deprecated. Please use the WriteConcern w option.
     * </dl>
	 * @throws MongoException if the inserted document is empty or if it contains zero-length keys. Attempting to insert an object with protected and private properties will cause a zero-length key error.
	 * @throws MongoCursorException if the "w" option is set and the write fails.
	 * @throws MongoCursorTimeoutException if the "w" option is set to a value greater than one and the operation takes longer than MongoCursor::$timeout milliseconds to complete. This does not kill the operation on the server, it is a client-side timeout. The operation in MongoCollection::$wtimeout is milliseconds.
	 * @return array|boolean If w was set, returns an array containing the status of the save.
     * Otherwise, returns a boolean representing if the array was not empty (an empty array will not be inserted).
	 */
    public function save($a, array $options = array()) {}

    /**
	 * Creates a database reference
	 * @link http://www.php.net/manual/en/mongocollection.createdbref.php
	 * @param array $a Object to which to create a reference.
	 * @return array Returns a database reference array.
	 */
    public function createDBRef(array $a) {}

	/**
	 * Fetches the document pointed to by a database reference
	 * @link http://www.php.net/manual/en/mongocollection.getdbref.php
	 * @param array $ref A database reference.
	 * @return array Returns the database document pointed to by the reference.
	 */
    public function getDBRef(array $ref) {}

    /**
    * @static
    * @return
    */
    protected static function toIndexString() {}

	/**
	 * Performs an operation similar to SQL's GROUP BY command
	 * @link http://www.php.net/manual/en/mongocollection.group.php
	 * @param mixed $keys Fields to group by. If an array or non-code object is passed, it will be the key used to group results.
	 * @param array $initial Initial value of the aggregation counter object.
	 * @param MongoCode $reduce A function that aggregates (reduces) the objects iterated.
	 * @param array $condition An condition that must be true for a row to be considered.
	 * @return array
	 */
    public function group($keys, array $initial, MongoCode $reduce, array $condition = array()) {}
}

/**
 * Result object for database query.
 * @link http://www.php.net/manual/en/class.mongocursor.php
 */
class MongoCursor implements Iterator, Traversable {
    /**
     * @link http://php.net/manual/en/class.mongocursor.php#mongocursor.props.slaveokay
	 * @static
     * @var bool $slaveOkay
     */
    public static $slaveOkay = FALSE;

    /**
	 * Create a new cursor
	 * @link http://www.php.net/manual/en/mongocursor.construct.php
	 * @param resource $connection Database connection.
	 * @param string $ns Full name of database and collection.
	 * @param array $query Database query.
	 * @param array $fields Fields to return.
     * @return MongoCursor Returns the new cursor
	 */
    public function __construct(resource $connection, $ns, array $query = array(), array $fields = array()) {}

    /**
	 * Checks if there are any more elements in this cursor
	 * @link http://www.php.net/manual/en/mongocursor.hasnext.php
	 * @throws MongoConnectionException
	 * @throws MongoCursorTimeoutException
     * @return bool Returns true if there is another element
	 */
    public function hasNext() {}

    /**
	 * Return the next object to which this cursor points, and advance the cursor
	 * @link http://www.php.net/manual/en/mongocursor.getnext.php
	 * @throws MongoConnectionException
	 * @throws MongoCursorTimeoutException
     * @return array Returns the next object
	 */
    public function getNext() {}

    /**
	 * Limits the number of results returned
	 * @link http://www.php.net/manual/en/mongocursor.limit.php
	 * @param int $num The number of results to return.
	 * @throws MongoCursorException
     * @return MongoCursor Returns this cursor
	 */
    public function limit($num) {}

    /**
	 * Skips a number of results
	 * @link http://www.php.net/manual/en/mongocursor.skip.php
	 * @param int $num The number of results to skip.
	 * @throws MongoCursorException
     * @return MongoCursor Returns this cursor
	 */
    public function skip($num) {}

    /**
	 * Sets whether this query can be done on a slave
	 * This method will override the static class variable slaveOkay.
	 * @link http://www.php.net/manual/en/mongocursor.slaveOkay.php
	 * @param boolean $okay If it is okay to query the slave.
	 * @throws MongoCursorException
     * @return MongoCursor Returns this cursor
	 */
    public function slaveOkay($okay = true) {}

    /**
	 * Sets whether this cursor will be left open after fetching the last results
	 * @link http://www.php.net/manual/en/mongocursor.tailable.php
	 * @param bool $tail If the cursor should be tailable.
     * @return MongoCursor Returns this cursor
	 */
    public function tailable($tail = true) {}

    /**
	 * Sets whether this cursor will timeout
	 * @link http://www.php.net/manual/en/mongocursor.immortal.php
	 * @param bool $liveForever If the cursor should be immortal.
	 * @throws MongoCursorException
     * @return MongoCursor Returns this cursor
	 */
    public function immortal($liveForever = true) {}

    /**
	 * Sets a client-side timeout for this query
	 * @link http://www.php.net/manual/en/mongocursor.timeout.php
	 * @param int $ms The number of milliseconds for the cursor to wait for a response. By default, the cursor will wait forever.
	 * @throws MongoCursorTimeoutException
     * @return MongoCursor Returns this cursor
	 */
    public function timeout(int $ms) {}

   /**
	* Checks if there are documents that have not been sent yet from the database for this cursor
	* @link http://www.php.net/manual/en/mongocursor.dead.php
    * @return boolean Returns if there are more results that have not been sent to the client, yet.
    */
    public function dead() {}

   /**
	* Use snapshot mode for the query
	* @link http://www.php.net/manual/en/mongocursor.snapshot.php
	* @throws MongoCursorException
    * @return MongoCursor Returns this cursor
    */
    public function snapshot() {}

    /**
	 * Sorts the results by given fields
	 * @link http://www.php.net/manual/en/mongocursor.sort.php
     * @param array $fields An array of fields by which to sort. Each element in the array has as key the field name, and as value either 1 for ascending sort, or -1 for descending sort
	 * @throws MongoCursorException
     * @return MongoCursor Returns the same cursor that this method was called on
	 */
    public function sort(array $fields) {}

   /**
	* Gives the database a hint about the query
	* @link http://www.php.net/manual/en/mongocursor.hint.php
	* @param array $key_pattern Indexes to use for the query.
	* @throws MongoCursorException
    * @return MongoCursor Returns this cursor
    */
    public function hint(array $key_pattern) {}


	/**
	 * Adds a top-level key/value pair to a query
	 * @link http://www.php.net/manual/en/mongocursor.addoption.php
	 * @param string $key Fieldname to add.
	 * @param mixed $value Value to add.
	 * @throws MongoCursorException
     * @return MongoCursor Returns this cursor
	 */
    public function addOption($key, $value) {}

   /**
	* Execute the query
	* @link http://www.php.net/manual/en/mongocursor.doquery.php
	* @throws MongoConnectionException if it cannot reach the database.
    * @return void
    */
    protected function doQuery() {}

   /**
	* Returns the current element
	* @link http://www.php.net/manual/en/mongocursor.current.php
    * @return array
    */
    public function current() {}

   /**
	* Returns the current result's _id
	* @link http://www.php.net/manual/en/mongocursor.key.php
    * @return string The current result's _id as a string.
    */
    public function key() {}

    /**
	 * Advances the cursor to the next result
	 * @link http://www.php.net/manual/en/mongocursor.next.php
	 * @throws MongoConnectionException
	 * @throws MongoCursorTimeoutException
	 * @return void
	 */
    public function next() {}

   /**
	* Returns the cursor to the beginning of the result set
	* @throws MongoConnectionException
	* @throws MongoCursorTimeoutException
    * @return void
    */
    public function rewind() {}

    /**
	 * Checks if the cursor is reading a valid result.
	 * @link http://www.php.net/manual/en/mongocursor.valid.php
	 * @return boolean If the current result is not null.
	 */
    public function valid() {}

   /**
	* Clears the cursor
	* @link http://www.php.net/manual/en/mongocursor.reset.php
    * @return void
    */
    public function reset() {}

   /**
	* Return an explanation of the query, often useful for optimization and debugging
	* @link http://www.php.net/manual/en/mongocursor.explain.php
    * @return array Returns an explanation of the query.
    */
    public function explain() {}

    /**
	 * Counts the number of results for this query
	 * @link http://www.php.net/manual/en/mongocursor.count.php
	 * @param bool $all Send cursor limit and skip information to the count function, if applicable.
	 * @return int The number of documents returned by this cursor's query.
	 */
    public function count($all = FALSE) {}

	/**
	 * Sets the fields for a query
	 * @link http://www.php.net/manual/en/mongocursor.fields.php
	 * @param array $f Fields to return (or not return).
	 * @throws MongoCursorException
	 * @return MongoCursor
	 */
	public function fields(array $f){}

	/**
	 * Gets the query, fields, limit, and skip for this cursor
	 * @link http://www.php.net/manual/en/mongocursor.info.php
	 * @return array The query, fields, limit, and skip for this cursor as an associative array.
	 */
	public function info(){}

    /**
     * PECL mongo >=1.0.11
     * Limits the number of elements returned in one batch.
     * <p>A cursor typically fetches a batch of result objects and store them locally.
     * This method sets the batchSize value to configure the amount of documents retrieved from the server in one data packet.
     * However, it will never return more documents than fit in the max batch size limit (usually 4MB).
     *
     * @param int $batchSize The number of results to return per batch. Each batch requires a round-trip to the server.
     * <p>If batchSize is 2 or more, it represents the size of each batch of objects retrieved.
     * It can be adjusted to optimize performance and limit data transfer.
     *
     * <p>If batchSize is 1 or negative, it will limit of number returned documents to the absolute value of batchSize,
     * and the cursor will be closed. For example if batchSize is -10, then the server will return a maximum of 10
     * documents and as many as can fit in 4MB, then close the cursor.
     * <b>Warning</b>
     * <p>A batchSize of 1 is special, and means the same as -1, i.e. a value of 1 makes the cursor only capable of returning one document.
     * <p>Note that this feature is different from MongoCursor::limit() in that documents must fit within a maximum size,
     * and it removes the need to send a request to close the cursor server-side.
     * The batch size can be changed even after a cursor is iterated, in which case the setting will apply on the next batch retrieval.
     * <p>This cannot override MongoDB's limit on the amount of data it will return to the client (i.e.,
     * if you set batch size to 1,000,000,000, MongoDB will still only return 4-16MB of results per batch).
     * <p>To ensure consistent behavior, the rules of MongoCursor::batchSize() and MongoCursor::limit() behave a little complex
     * but work "as expected". The rules are: hard limits override soft limits with preference given to MongoCursor::limit() over
     * MongoCursor::batchSize(). After that, whichever is set and lower than the other will take precedence.
     * See below. section for some examples.
     * @return MongoCursor Returns this cursor.
     * @link http://docs.php.net/manual/en/mongocursor.batchsize.php
     */
    public function batchSize($batchSize){}
}

/**
 *
 */
class MongoGridFS extends MongoCollection {
    const ASCENDING = 1;
    const DESCENDING = -1;

    /**
     * @link http://php.net/manual/en/class.mongogridfs.php#mongogridfs.props.chunks
     * @var $chunks MongoCollection
     */
    public $chunks;

    /**
     * @link http://php.net/manual/en/class.mongogridfs.php#mongogridfs.props.filesname
     * @var $filesName string
     */
    protected $filesName;

    /**
     * @link http://php.net/manual/en/class.mongogridfs.php#mongogridfs.props.chunksname
     * @var $chunksName string
     */
    protected $chunksName;



    /**
     * Files as stored across two collections, the first containing file meta
     * information, the second containing chunks of the actual file. By default,
     * fs.files and fs.chunks are the collection names used.
     *
     * @link http://php.net/manual/en/mongogridfs.construct.php
     * @param MongoDB $db Database
     * @param string $prefix
     * @param mixed $chunks
     * @return
     */
    public function __construct($db, $prefix = 'fs', $chunks = 'fs') {}

    /**
     * Drops the files and chunks collections
     * @link http://php.net/manual/en/mongogridfs.drop.php
     * @return array The database response
     */
    public function drop() {}

    /**
     * @link http://php.net/manual/en/mongogridfs.find.php
     * @param array $query The query
     * @param array $fields Fields to return
     * @return MongoGridFSCursor A MongoGridFSCursor
     */
    public function find(array $query = array(), array $fields = array()) {}

    /**
     * Stores a file in the database
     * @link http://php.net/manual/en/mongogridfs.storefile.php
     * @param string $filename The name of the file
     * @param array $extra Other metadata to add to the file saved
     * @param array $options Options for the store. "safe": Check that this store succeeded
     * @return mixed Returns the _id of the saved object
     */
    public function storeFile($filename, $extra = array(), $options = array()) {}

    /**
     * Chunkifies and stores bytes in the database
     * @link http://php.net/manual/en/mongogridfs.storebytes.php
     * @param string $bytes A string of bytes to store
     * @param array $extra Other metadata to add to the file saved
     * @param array $options Options for the store. "safe": Check that this store succeeded
     * @return mixed The _id of the object saved
     */
    public function storeBytes($bytes, $extra = array(), $options = array()) {}

    /**
	 * Returns a single file matching the criteria
	 * @link http://www.php.net/manual/en/mongogridfs.findone.php
	 * @param array $query The fields for which to search.
	 * @param array $fields Fields of the results to return.
	 * @return MongoGridFSFile|null
	 */
    public function findOne(array $query = array(), array $fields = array()) {}

    /**
	 * Removes files from the collections
	 * @link http://www.php.net/manual/en/mongogridfs.remove.php
	 * @param array $criteria Description of records to remove.
	 * @param array $options Options for remove. Valid options are: "safe"- Check that the remove succeeded.
	 * @throws MongoCursorException
	 * @return boolean
	 */
    public function remove(array $criteria = array(), array $options = array()) {}

    /**
     * Delete a file from the database
     * @link http://php.net/manual/en/mongogridfs.delete.php
     * @param mixed $id _id of the file to remove
     * @return boolean Returns true if the remove was successfully sent to the database.
     */
    public function delete($id) {}

    /**
	 * Saves an uploaded file directly from a POST to the database
	 * @link http://www.php.net/manual/en/mongogridfs.storeupload.php
	 * @param string $name The name attribute of the uploaded file, from <input type="file" name="something"/>.
	 * @param array $metadata An array of extra fields for the uploaded file.
	 * @return mixed Returns the _id of the uploaded file.
	 */
    public function storeUpload($name, array $metadata = array()) {}


    /**
	* Retrieve a file from the database
	* @link http://www.php.net/manual/en/mongogridfs.get.php
    * @param mixed $id _id of the file to find.
    * @return MongoGridFSFile|null Returns the file, if found, or NULL.
    */
    public function __get($id) {}

     /**
     * Stores a file in the database
     * @link http://php.net/manual/en/mongogridfs.put.php
     * @param string $filename The name of the file
     * @param array $extra Other metadata to add to the file saved
     * @return mixed Returns the _id of the saved object
     */
    public function put($filename, array $extra = array()) {}

}

class MongoGridFSFile {
    /**
    * @link http://php.net/manual/en/class.mongogridfsfile.php#mongogridfsfile.props.file
    * @var $file
    */
    public $file;

    /**
    * @link http://php.net/manual/en/class.mongogridfsfile.php#mongogridfsfile.props.gridfs
    * @var $gridfs
    */
    protected $gridfs;

    /**
     * @link http://php.net/manual/en/mongogridfsfile.construct.php
     * @param MongoGridFS $gridfs The parent MongoGridFS instance
     * @param array $file A file from the database
     * @return MongoGridFSFile Returns a new MongoGridFSFile
     */
    public function __construct($gridfs, array $file) {}

    /**
     * Returns this file's filename
     * @link http://php.net/manual/en/mongogridfsfile.getfilename.php
     * @return string Returns the filename
    */
    public function getFilename() {}

    /**
     * Returns this file's size
     * @link http://php.net/manual/en/mongogridfsfile.getsize.php
     * @return int Returns this file's size
    */
    public function getSize() {}

    /**
     * Writes this file to the filesystem
     * @link http://php.net/manual/en/mongogridfsfile.write.php
     * @param string $filename The location to which to write the file (path+filename+extension). If none is given, the stored filename will be used.
     * @return int Returns the number of bytes written
     */
    public function write($filename = null) {}

    /**
     * This will load the file into memory. If the file is bigger than your memory, this will cause problems!
     * @link http://php.net/manual/en/mongogridfsfile.getbytes.php
     * @return string Returns a string of the bytes in the file
     */
    public function getBytes() {}

     /**
     * This method returns a stream resource that can be used to read the stored file with all file functions in PHP.
     * The contents of the file are pulled out of MongoDB on the fly, so that the whole file does not have to be loaded into memory first.
     * At most two GridFSFile chunks will be loaded in memory.
     *
     * @link http://php.net/manual/en/mongogridfsfile.getresource.php
     * @return stream Returns a resource that can be used to read the file with
     */
    public function getResource() {}
}

class MongoGridFSCursor extends MongoCursor implements Traversable, Iterator {
    /**
    * @static
    * @var $slaveOkay
    */
    public static $slaveOkay;

    /**
    * @link http://php.net/manual/en/class.mongogridfscursor.php#mongogridfscursor.props.gridfs
    * @var $gridfs
    */
    protected $gridfs;

    /**
     * Create a new cursor
     * @link http://php.net/manual/en/mongogridfscursor.construct.php
     * @param MongoGridFS $gridfs Related GridFS collection
     * @param resource $connection Database connection
     * @param string $ns Full name of database and collection
     * @param array $query Database query
     * @param array $fields Fields to return
     * @return MongoGridFSCursor Returns the new cursor
     */
    public function __construct($gridfs, $connection, $ns, $query, $fields) {}

    /**
    * Return the next file to which this cursor points, and advance the cursor
    * @link http://php.net/manual/en/mongogridfscursor.getnext.php
    * @return MongoGridFSFile Returns the next file
    */
    public function getNext() {}

    /**
    * Returns the current file
    * @link http://php.net/manual/en/mongogridfscursor.current.php
    * @return MongoGridFSFile The current file
    */
    public function current() {}

    /**
    * Returns the current result's filename
    * @link http://php.net/manual/en/mongogridfscursor.key.php
    * @return string The current results filename
    */
    public function key() {}

}

/**
 * A unique identifier created for database objects.
 * @link http://www.php.net/manual/en/class.mongoid.php
 */
class MongoId {
    /**
     * @var $id
     */
     public $id;

    /**
	 * Creates a new id
	 * @link http://www.php.net/manual/en/mongoid.construct.php
	 * @param string $id A string to use as the id. Must be 24 hexidecimal characters. If an invalid string is passed to this constructor, the constructor will ignore it and create a new id value.
	 * @return MongoId
	 */
    public function __construct($id = NULL) {}

   /**
	* Returns a hexidecimal representation of this id
	* @link http://www.php.net/manual/en/mongoid.tostring.php
    * @return string This id.
    */
    public function __toString() {}

   /**
	* Gets the number of seconds since the epoch that this id was created
	* @link http://www.php.net/manual/en/mongoid.gettimestamp.php
    * @return int
    */
    public function getTimestamp() {}
}

class MongoCode {
    /**
    * @var $code
    */
    public $code;

    /**
    * @var $scope
    */
    public $scope;

    /**
     * .
     *
     * @link http://php.net/manual/en/mongocode.construct.php
     * @param string $code A string of code
     * @param array $scope The scope to use for the code
     * @return MongoCode Returns a new code object
     */
    public function __construct($code, array $scope = array()) {}

    /**
    * Returns this code as a string
    * @return string
    */
    public function __toString() {}
}

class MongoRegex {
    /**
     * @link http://php.net/manual/en/class.mongoregex.php#mongoregex.props.regex
     * @var $regex
     */
    public $regex;

    /**
     * @link http://php.net/manual/en/class.mongoregex.php#mongoregex.props.flags
     * @var $flags
     */
    public $flags;

    /**
     * Creates a new regular expression.
     *
     * @link http://php.net/manual/en/mongoregex.construct.php
     * @param string $regex Regular expression string of the form /expr/flags
     * @return MongoRegex Returns a new regular expression
     */
    public function __construct($regex) {}

    /**
    * Returns a string representation of this regular expression.
    * @return string This regular expression in the form "/expr/flags".
    */
    public function __toString() {}
}

class MongoDate {
    /**
     * @link http://php.net/manual/en/class.mongodate.php#mongodate.props.sec
     * @var int $sec
     */
    public $sec;

    /**
     * @link http://php.net/manual/en/class.mongodate.php#mongodate.props.usec
     * @var int $usec
     */
    public $usec;

    /**
     * Creates a new date. If no parameters are given, the current time is used.
     *
     * @link http://php.net/manual/en/mongodate.construct.php
     * @param int $sec Number of seconds since January 1st, 1970
     * @param int $usec Microseconds
     * @return MongoDate Returns this new date
     */
    public function __construct($sec = 0, $usec = 0) {}

    /**
    * Returns a string representation of this date
    * @return string
    */
    public function __toString() {}
}

class MongoBinData {
     /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.constants.func
     */
    const FUNC = 1;

     /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.constants.byte-array
     */
    const BYTE_ARRAY = 2;

     /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.constants.uuid
     */
    const UUID = 3;

     /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.constants.md5
     */
    const MD5 = 5;

     /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.constants.custom
     */
    const CUSTOM = 128;


    /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.props.bin
     * @var $bin
     */
    public $bin;

    /**
     * @link http://php.net/manual/en/class.mongobindata.php#mongobindata.props.type
     * @var $type
     */
    public $type;


    /**
     * Creates a new binary data object.
     *
     * @link http://php.net/manual/en/mongobindata.construct.php
     * @param string $data Binary data
     * @param int $type Data type
     * @return MongoBinData Returns a new binary data object
     */
    public function __construct($data, $type = 2) {}

    /**
    * Returns the string representation of this binary data object.
    * @return string
    */
    public function __toString() {}
}

class MongoDBRef {
    /**
    * @static
    * @var $refKey
    */
    protected static $refKey = '$ref';

    /**
    * @static
    * @var $idKey
    */
    protected static $idKey = '$id';

    /**
     * If no database is given, the current database is used.
     *
     * @link http://php.net/manual/en/mongodbref.create.php
     * @static
     * @param string $collection Collection name (without the database name)
     * @param mixed $id The _id field of the object to which to link
     * @param string $database Database name
     * @return array Returns the reference
     */
    public static function create($collection, $id, $database = null) {}

    /**
     * This not actually follow the reference, so it does not determine if it is broken or not.
     * It merely checks that $ref is in valid database reference format (in that it is an object or array with $ref and $id fields).
     *
     * @link http://php.net/manual/en/mongodbref.isref.php
     * @static
     * @param mixed $ref Array or object to check
     * @return boolean Returns true if $ref is a reference
     */
    public static function isRef($ref) {}

    /**
     * Fetches the object pointed to by a reference
     * @link http://php.net/manual/en/mongodbref.get.php
     * @static
     * @param MongoDB $db Database to use
     * @param array $ref Reference to fetch
     * @return array|null Returns the document to which the reference refers or null if the document does not exist (the reference is broken)
     */
    public static function get($db, $ref) {}
}

class MongoException extends Exception {
}

class MongoCursorException extends MongoException {

}

class MongoCursorTimeoutException extends MongoCursorException {

}

class MongoConnectionException extends MongoException {

}

class MongoGridFSException extends MongoException {

}

class MongoTimestamp {
    /**
     * @link http://php.net/manual/en/class.mongotimestamp.php#mongotimestamp.props.sec
     * @var $sec
     */
    public $sec;

    /**
     * @link http://php.net/manual/en/class.mongotimestamp.php#mongotimestamp.props.inc
     * @var $inc
     */
    public $inc;

 /**
     * Creates a new timestamp. If no parameters are given, the current time is used
     * and the increment is automatically provided. The increment is set to 0 when the
     * module is loaded and is incremented every time this constructor is called
     * (without the $inc parameter passed in).
     *
     * @link http://php.net/manual/en/mongotimestamp.construct.php
     * @param int $sec [optional] Number of seconds since January 1st, 1970
     * @param int $inc [optional] Increment
     */
    public function __construct($sec = 0, $inc) {}

    /**
    * @return string
    */
    public function __toString() {}
}

class MongoInt32 {
    /**
     * @link http://php.net/manual/en/class.mongoint32.php#mongoint32.props.value
     * @var $value
     */
    public $value;


    /**
     * Creates a new 32-bit number with the given value.
     *
     * @link http://php.net/manual/en/mongoint32.construct.php
     * @param string $value A number
     */
    public function __construct($value) {}

    /**
    * @return string
    */
    public function __toString() {}
}

class MongoInt64 {
    /**
     * @link http://php.net/manual/en/class.mongoint64.php#mongoint64.props.value
     * @var $value
     */
    public $value;


    /**
     * Creates a new 64-bit number with the given value.
     *
     * @link http://php.net/manual/en/mongoint64.construct.php
     * @param string $value A number
     */
    public function __construct($value) {}

    /**
    * @return string
    */
    public function __toString() {}
}

class MongoLog {
        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.none
     */
    const NONE = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.all
     */
    const ALL = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.warning
     */
    const WARNING = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.info
     */
    const INFO = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.fine
     */
    const FINE = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.rs
     */
    const RS = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.pool
     */
    const POOL = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.io
     */
    const IO = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.server
     */
    const SERVER = 0;

        /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.constants.parse
     */
    const PARSE = 0;


    /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.props.level@static
     *
     * @var $level
     */
    private static $level = 0;

    /**
     * @link http://php.net/manual/en/class.mongolog.php#mongolog.props.module@static
     *
     * @var $module
     */
    private static $module = 0;


    /**
     * This function can be used to set how verbose logging should be and the types of
     * activities that should be logged. Use the constants described in the MongoLog
     * section with bitwise operators to specify levels.
     *
     * @link http://php.net/manual/en/mongolog.setlevel.php
     * @static
     * @param int $level The levels you would like to log
     * @return void
     */
    public static function setLevel($level) {}

    /**
     * This can be used to see the log level. Use the constants described in the
     * MongoLog section with bitwise operators to check the level.
     *
     * @link http://php.net/manual/en/mongolog.getlevel.php
     * @static
     * @return int Returns the current level
     */
    public static function getLevel() {}

    /**
     * This function can be used to set which parts of the driver's functionality
     * should be logged. Use the constants described in the MongoLog section with
     * bitwise operators to specify modules.
     *
     * @link http://php.net/manual/en/mongolog.setmodule.php
     * @static
     * @param int $module The module(s) you would like to log
     * @return void
     */
    public static function setModule($module) {}

    /**
     * This function can be used to see which parts of the driver's functionality are
     * being logged. Use the constants described in the MongoLog section with bitwise
     * operators to check if specific modules are being logged.
     *
     * @link http://php.net/manual/en/mongolog.getmodule.php
     * @static
     * @return int Returns the modules currently being logged
     */
    public static function getModule() {}
}

class MongoPool {
    /**
     * Returns an array of information about all connection pools.
     *
     * @link http://php.net/manual/en/mongopool.info.php
     * @static
     * @return array Each connection pool has an identifier, which starts with the host. For
     *         each pool, this function shows the following fields: $in use The number of
     *         connections currently being used by Mongo instances. $in pool The number of
     *         connections currently in the pool (not being used). $remaining The number of
     *         connections that could be created by this pool. For example, suppose a pool had
     *         5 connections remaining and 3 connections in the pool. We could create 8 new
     *         instances of Mongo before we exhausted this pool (assuming no instances of Mongo
     *         went out of scope, returning their connections to the pool). A negative number
     *         means that this pool will spawn unlimited connections. Before a pool is created,
     *         you can change the max number of connections by calling Mongo::setPoolSize. Once
     *         a pool is showing up in the output of this function, its size cannot be changed.
     *         $total The total number of connections allowed for this pool. This should be
     *         greater than or equal to "in use" + "in pool" (or -1). $timeout The socket
     *         timeout for connections in this pool. This is how long connections in this pool
     *         will attempt to connect to a server before giving up. $waiting If you have
     *         capped the pool size, workers requesting connections from the pool may block
     *         until other workers return their connections. This field shows how many
     *         milliseconds workers have blocked for connections to be released. If this number
     *         keeps increasing, you may want to use MongoPool::setSize to add more connections
     *         to your pool
     */
    public static function info() {}

    /**
     * Sets the max number of connections new pools will be able to create.
     *
     * @link http://php.net/manual/en/mongopool.setsize.php
     * @static
     * @param int $size The max number of connections future pools will be able to
     *        create. Negative numbers mean that the pool will spawn an infinite number of
     *        connections
     * @return boolean Returns the former value of pool size
     */
    public static function setSize($size) {}

    /**
     * .
     *
     * @link http://php.net/manual/en/mongopool.getsize.php
     * @static
     * @return int Returns the current pool size
     */
    public static function getSize() {}
}


class MongoMaxKey {
}

class MongoMinKey {
}

