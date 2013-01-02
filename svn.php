<?php

// Start of svn v.1.0.1

class Svn  {
	const NON_RECURSIVE = 1;
	const DISCOVER_CHANGED_PATHS = 2;
	const OMIT_MESSAGES = 4;
	const STOP_ON_COPY = 8;
	const ALL = 16;
	const SHOW_UPDATES = 32;
	const NO_IGNORE = 64;
	const IGNORE_EXTERNALS = 128;
	const INITIAL = 1;
	const HEAD = -1;
	const BASE = -2;
	const COMMITTED = -3;
	const PREV = -4;
	const UNSPECIFIED = -5;


	public static function cat () {}

	public static function checkout () {}

	public static function log () {}

	public static function status () {}

}

class SvnWc  {
	const NONE = 1;
	const UNVERSIONED = 2;
	const NORMAL = 3;
	const ADDED = 4;
	const MISSING = 5;
	const DELETED = 6;
	const REPLACED = 7;
	const MODIFIED = 8;
	const MERGED = 9;
	const CONFLICTED = 10;
	const IGNORED = 11;
	const OBSTRUCTED = 12;
	const EXTERNAL = 13;
	const INCOMPLETE = 14;

}

class SvnWcSchedule  {
	const NORMAL = 0;
	const ADD = 1;
	const DELETE = 2;
	const REPLACE = 3;

}

class SvnNode  {
	const NONE = 0;
	const FILE = 1;
	const DIR = 2;
	const UNKNOWN = 3;

}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Checks out a working copy from the repository
 * @link http://php.net/manual/en/function.svn-checkout.php
 * @param string $repos <p>
 * String URL path to directory in repository to check out.
 * </p>
 * @param string $targetpath <p>
 * String local path to directory to check out in to
 * </p>
 * &svn.relativepath;
 * @param int $revision [optional] <p>
 * Integer revision number of repository to check out. Default is
 * HEAD, the most recent revision.
 * </p>
 * @param int $flags [optional] <p>
 * Any combination of <b>SVN_NON_RECURSIVE</b> and
 * <b>SVN_IGNORE_EXTERNALS</b>.
 * </p>
 * @return bool true on success or false on failure.
 */
function svn_checkout ($repos, $targetpath, $revision = null, $flags = 0) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the contents of a file in a repository
 * @link http://php.net/manual/en/function.svn-cat.php
 * @param string $repos_url <p>
 * String URL path to item in a repository.
 * </p>
 * @param int $revision_no [optional] <p>
 * Integer revision number of item to retrieve, default is the HEAD
 * revision.
 * </p>
 * @return string the string contents of the item from the repository on
 * success, and false on failure.
 */
function svn_cat ($repos_url, $revision_no = null) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns list of directory contents in repository URL, optionally at revision number
 * @link http://php.net/manual/en/function.svn-ls.php
 * @param string $repos_url
 * @param int $revision_no [optional]
 * @param bool $recurse [optional] <p>
 * Enables recursion.
 * </p>
 * @param bool $peg [optional]
 * @return array On success, this function returns an array file listing in the format
 * of:
 * <pre>
 * [0] => Array
 * (
 * [created_rev] => integer revision number of last edit
 * [last_author] => string author name of last edit
 * [size] => integer byte file size of file
 * [time] => string date of last edit in form 'M d H:i'
 * or 'M d Y', depending on how old the file is
 * [time_t] => integer unix timestamp of last edit
 * [name] => name of file/directory
 * [type] => type, can be 'file' or 'dir'
 * )
 * [1] => ...
 * </pre>
 */
function svn_ls ($repos_url, $revision_no = 'SVN_REVISION_HEAD', $recurse = false, $peg = false) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the commit log messages of a repository URL
 * @link http://php.net/manual/en/function.svn-log.php
 * @param string $repos_url <p>
 * Repository URL of the item to retrieve log history from.
 * </p>
 * @param int $start_revision [optional] <p>
 * Revision number of the first log to retrieve. Use
 * <b>SVN_REVISION_HEAD</b> to retrieve the log from
 * the most recent revision.
 * </p>
 * @param int $end_revision [optional] <p>
 * Revision number of the last log to retrieve. Defaults to
 * <i>start_revision</i> if specified or to
 * <b>SVN_REVISION_INITIAL</b> otherwise.
 * </p>
 * @param int $limit [optional] <p>
 * Number of logs to retrieve.
 * </p>
 * @param int $flags [optional] <p>
 * Any combination of <b>SVN_OMIT_MESSAGES</b>,
 * <b>SVN_DISCOVER_CHANGED_PATHS</b> and
 * <b>SVN_STOP_ON_COPY</b>.
 * </p>
 * @return array On success, this function returns an array file listing in the format
 * of:
 * <pre>
 * [0] => Array, ordered most recent (highest) revision first
 * (
 * [rev] => integer revision number
 * [author] => string author name
 * [msg] => string log message
 * [date] => string date formatted per ISO 8601, i.e. date('c')
 * [paths] => Array, describing changed files
 * (
 * [0] => Array
 * (
 * [action] => string letter signifying change
 * [path] => absolute repository path of changed file
 * )
 * [1] => ...
 * )
 * )
 * [1] => ...
 * </pre>
 * </p>
 * <p>
 * The output will always be a numerically indexed array of arrays,
 * even when there are none or only one log message(s).
 * </p>
 * <p>
 * The value of action is a subset of the
 * status output
 * in the first column, where possible values are:
 * </p>
 * <table>
 * Actions
 * <tr valign="top">
 * <td>Letter</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>M</td>
 * <td>Item/props was modified</td>
 * </tr>
 * <tr valign="top">
 * <td>A</td>
 * <td>Item was added</td>
 * </tr>
 * <tr valign="top">
 * <td>D</td>
 * <td>Item was deleted</td>
 * </tr>
 * <tr valign="top">
 * <td>R</td>
 * <td>Item was replaced</td>
 * </tr>
 * </table>
 * <p>
 * If no changes were made to the item, an empty array is returned.
 */
function svn_log ($repos_url, $start_revision = null, $end_revision = null, $limit = 0, $flags = 'SVN_DISCOVER_CHANGED_PATHS | SVN_STOP_ON_COPY') {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Sets an authentication parameter
 * @link http://php.net/manual/en/function.svn-auth-set-parameter.php
 * @param string $key <p>
 * String key name. Use the authentication constants
 * defined by this extension to specify a key.
 * </p>
 * @param string $value <p>
 * String value to set to parameter at key. Format of value varies
 * with the parameter.
 * </p>
 * @return void
 */
function svn_auth_set_parameter ($key, $value) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Retrieves authentication parameter
 * @link http://php.net/manual/en/function.svn-auth-get-parameter.php
 * @param string $key <p>
 * String key name. Use the authentication constants
 * defined by this extension to specify a key.
 * </p>
 * @return string the string value of the parameter at <i>key</i>;
 * returns null if parameter does not exist.
 */
function svn_auth_get_parameter ($key) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the version of the SVN client libraries
 * @link http://php.net/manual/en/function.svn-client-version.php
 * @return string String version number, usually in form of x.y.z.
 */
function svn_client_version () {}

function svn_config_ensure () {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Recursively diffs two paths
 * @link http://php.net/manual/en/function.svn-diff.php
 * @param string $path1 <p>
 * First path to diff. This can be a URL to a file/directory in an SVN
 * repository or a local file/directory path.
 * </p>
 * &svn.relativepath;
 * If a local file path has only backslashes and no forward slashes,
 * this extension will fail to find the path. Always
 * replace all backslashes with forward slashes when using this
 * function.
 * @param int $rev1 <p>
 * First path's revision number. Use <b>SVN_REVISION_HEAD</b>
 * to specify the most recent revision.
 * </p>
 * @param string $path2 <p>
 * Second path to diff. See <i>path1</i> for description.
 * </p>
 * @param int $rev2 <p>
 * Second path's revision number. See <i>rev1</i>
 * for description.
 * </p>
 * @return array an array-list consisting of two streams: the first is the diff output
 * and the second contains error stream output. The streams can be
 * read using <b>fread</b>. Returns false or null on
 * error.
 * </p>
 * <p>
 * The diff output will, by default, be in the form of Subversion's
 * custom unified diff format, but an
 * external
 * diff engine may be
 * used depending on Subversion's configuration.
 */
function svn_diff ($path1, $rev1, $path2, $rev2) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Recursively cleanup a working copy directory, finishing incomplete operations and removing locks
 * @link http://php.net/manual/en/function.svn-cleanup.php
 * @param string $workingdir <p>
 * String path to local working directory to cleanup
 * </p>
 * &svn.relativepath;
 * @return bool true on success or false on failure.
 */
function svn_cleanup ($workingdir) {}

/**
 * (PECL svn &gt;= 0.3.0)<br/>
 * Revert changes to the working copy
 * @link http://php.net/manual/en/function.svn-revert.php
 * @param string $path <p>
 * The path to the working repository.
 * </p>
 * @param bool $recursive [optional] <p>
 * Optionally make recursive changes.
 * </p>
 * @return bool true on success or false on failure.
 */
function svn_revert ($path, $recursive = false) {}

function svn_resolved () {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Sends changes from the local working copy to the repository
 * @link http://php.net/manual/en/function.svn-commit.php
 * @param string $log <p>
 * String log text to commit
 * </p>
 * @param array $targets <p>
 * Array of local paths of files to be committed
 * </p>
 * This parameter must be an array, a string for a single
 * target is not acceptable.
 * &svn.relativepath;
 * @param bool $dontrecurse [optional] <p>
 * Boolean flag to disable recursive committing of
 * directories in the <i>targets</i> array.
 * Default is false.
 * </p>
 * @return array array in form of:
 * </p>
 * <pre>
 * array(
 * 0 => integer revision number of commit
 * 1 => string ISO 8601 date and time of commit
 * 2 => name of committer
 * )
 * </pre>
 * <p>
 * Returns false on failure.
 */
function svn_commit ($log, array $targets, $dontrecurse = false) {}

function svn_lock () {}

function svn_unlock () {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Schedules the addition of an item in a working directory
 * @link http://php.net/manual/en/function.svn-add.php
 * @param string $path <p>
 * Path of item to add.
 * </p>
 * &svn.relativepath;
 * @param bool $recursive [optional] <p>
 * If item is directory, whether or not to recursively add
 * all of its contents. Default is true
 * </p>
 * @param bool $force [optional] <p>
 * If true, Subversion will recurse into already versioned directories
 * in order to add unversioned files that may be hiding in those
 * directories. Default is false
 * </p>
 * @return bool true on success or false on failure.
 */
function svn_add ($path, $recursive = true, $force = false) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the status of working copy files and directories
 * @link http://php.net/manual/en/function.svn-status.php
 * @param string $path <p>
 * Local path to file or directory to retrieve status of.
 * </p>
 * &svn.relativepath;
 * @param int $flags [optional] <p>
 * Any combination of <b>SVN_NON_RECURSIVE</b>,
 * <b>SVN_ALL</b> (regardless of modification status),
 * <b>SVN_SHOW_UPDATES</b> (entries will be added for items
 * that are out-of-date), <b>SVN_NO_IGNORE</b> (disregard
 * svn:ignore properties when scanning for new files)
 * and <b>SVN_IGNORE_EXTERNALS</b>.
 * </p>
 * @return array a numerically indexed array of associative arrays detailing
 * the status of items in the repository:
 * </p>
 * <pre>
 * Array (
 * [0] => Array (
 * // information on item
 * )
 * [1] => ...
 * )
 * </pre>
 * <p>
 * The information on the item is an associative array that can contain
 * the following keys:
 * </p>
 * path
 * String path to file/directory of this entry on local filesystem.
 * text_status
 * Status of item's text. &svn.referto.status;
 * repos_text_status
 * Status of item's text in repository. Only accurate if
 * <i>update</i> was set to true.
 * &svn.referto.status;
 * prop_status
 * Status of item's properties. &svn.referto.status;
 * repos_prop_status
 * Status of item's property in repository. Only accurate if
 * <i>update</i> was set to true. &svn.referto.status;
 * locked
 * Whether or not the item is locked. (Only set if true.)
 * copied
 * Whether or not the item was copied (scheduled for addition with
 * history). (Only set if true.)
 * switched
 * Whether or not the item was switched using the switch command.
 * (Only set if true)
 * <p>
 * These keys are only set if the item is versioned:
 * </p>
 * name
 * Base name of item in repository.
 * url
 * URL of item in repository.
 * repos
 * Base URL of repository.
 * revision
 * Integer revision of item in working copy.
 * kind
 * Type of item, i.e. file or directory. &svn.referto.type;
 * schedule
 * Scheduled action for item, i.e. addition or deletion. Constants
 * for these magic numbers are not available, they can
 * be emulated by using:
 * <code>
 * if (!defined('svn_wc_schedule_normal')) {
 * define('svn_wc_schedule_normal', 0); // nothing special
 * define('svn_wc_schedule_add', 1); // item will be added
 * define('svn_wc_schedule_delete', 2); // item will be deleted
 * define('svn_wc_schedule_replace', 3); // item will be added and deleted
 * }
 * </code>
 * deleted
 * Whether or not the item was deleted, but parent revision lags
 * behind. (Only set if true.)
 * absent
 * Whether or not the item is absent, that is, Subversion knows that
 * there should be something there but there isn't. (Only set if
 * true.)
 * incomplete
 * Whether or not the entries file for a directory is incomplete.
 * (Only set if true.)
 * cmt_date
 * Integer Unix timestamp of last commit date. (Unaffected by <i>update</i>.)
 * cmt_rev
 * Integer revision of last commit. (Unaffected by <i>update</i>.)
 * cmt_author
 * String author of last commit. (Unaffected by <i>update
 */
function svn_status ($path, $flags = 0) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Update working copy
 * @link http://php.net/manual/en/function.svn-update.php
 * @param string $path <p>
 * Path to local working copy.
 * </p>
 * &svn.relativepath;
 * @param int $revno [optional] <p>
 * Revision number to update to, default is <b>SVN_REVISION_HEAD</b>.
 * </p>
 * @param bool $recurse [optional] <p>
 * Whether or not to recursively update directories.
 * </p>
 * @return int new revision number on success, returns false on failure.
 */
function svn_update ($path, $revno = 'SVN_REVISION_HEAD', $recurse = true) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Imports an unversioned path into a repository
 * @link http://php.net/manual/en/function.svn-import.php
 * @param string $path <p>
 * Path of file or directory to import.
 * </p>
 * &svn.relativepath;
 * @param string $url <p>
 * Repository URL to import into.
 * </p>
 * @param bool $nonrecursive <p>
 * Whether or not to refrain from recursively processing directories.
 * </p>
 * @return bool true on success or false on failure.
 */
function svn_import ($path, $url, $nonrecursive) {}

function svn_info () {}

/**
 * (PECL svn &gt;= 0.3.0)<br/>
 * Export the contents of a SVN directory
 * @link http://php.net/manual/en/function.svn-export.php
 * @param string $frompath <p>
 * The path to the current repository.
 * </p>
 * @param string $topath <p>
 * The path to the new repository.
 * </p>
 * @param bool $working_copy [optional] <p>
 * If true, it will export uncommitted files from the working copy.
 * </p>
 * @param int $revision_no [optional]
 * @return bool true on success or false on failure.
 */
function svn_export ($frompath, $topath, $working_copy = true, $revision_no = -1) {}

function svn_copy () {}

function svn_switch () {}

/**
 * (PECL svn &gt;= 0.3.0)<br/>
 * Get the SVN blame for a file
 * @link http://php.net/manual/en/function.svn-blame.php
 * @param string $repository_url <p>
 * The repository URL.
 * </p>
 * @param int $revision_no [optional] <p>
 * The revision number.
 * </p>
 * @return array An array of SVN blame information separated by line
 * which includes the revision number, line number, line of code,
 * author, and date.
 */
function svn_blame ($repository_url, $revision_no = 'SVN_REVISION_HEAD') {}

/**
 * (PECL svn &gt;= 0.4.0)<br/>
 * Delete items from a working copy or repository.
 * @link http://php.net/manual/en/function.svn-delete.php
 * @param string $path <p>
 * Path of item to delete.
 * </p>
 * &svn.relativepath;
 * @param bool $force [optional] <p>
 * If true, the file will be deleted even if it has local modifications.
 * Otherwise, local modifications will result in a failure. Default is
 * false
 * </p>
 * @return bool true on success or false on failure.
 */
function svn_delete ($path, $force = false) {}

/**
 * (PECL svn &gt;= 0.4.0)<br/>
 * Creates a directory in a working copy or repository
 * @link http://php.net/manual/en/function.svn-mkdir.php
 * @param string $path <p>
 * The path to the working copy or repository.
 * </p>
 * @param string $log_message [optional]
 * @return bool true on success or false on failure.
 */
function svn_mkdir ($path, $log_message = null) {}

function svn_move () {}

function svn_proplist () {}

function svn_propget () {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Create a new subversion repository at path
 * @link http://php.net/manual/en/function.svn-repos-create.php
 * @param string $path <p>
 * Its description
 * </p>
 * @param array $config [optional] <p>
 * Its description
 * </p>
 * @param array $fsconfig [optional] <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_create ($path, array $config = null, array $fsconfig = null) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Run recovery procedures on the repository located at path.
 * @link http://php.net/manual/en/function.svn-repos-recover.php
 * @param string $path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_recover ($path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Make a hot-copy of the repos at repospath; copy it to destpath
 * @link http://php.net/manual/en/function.svn-repos-hotcopy.php
 * @param string $repospath <p>
 * Its description
 * </p>
 * @param string $destpath <p>
 * Its description
 * </p>
 * @param bool $cleanlogs <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_hotcopy ($repospath, $destpath, $cleanlogs) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Open a shared lock on a repository.
 * @link http://php.net/manual/en/function.svn-repos-open.php
 * @param string $path <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_open ($path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Gets a handle on the filesystem for a repository
 * @link http://php.net/manual/en/function.svn-repos-fs.php
 * @param resource $repos <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_fs ($repos) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Create a new transaction
 * @link http://php.net/manual/en/function.svn-repos-fs-begin-txn-for-commit.php
 * @param resource $repos <p>
 * Its description
 * </p>
 * @param int $rev <p>
 * Its description
 * </p>
 * @param string $author <p>
 * Its description
 * </p>
 * @param string $log_msg <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_fs_begin_txn_for_commit ($repos, $rev, $author, $log_msg) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Commits a transaction and returns the new revision
 * @link http://php.net/manual/en/function.svn-repos-fs-commit-txn.php
 * @param resource $txn <p>
 * Its description
 * </p>
 * @return int What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_repos_fs_commit_txn ($txn) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Get a handle on a specific version of the repository root
 * @link http://php.net/manual/en/function.svn-fs-revision-root.php
 * @param resource $fs <p>
 * Its description
 * </p>
 * @param int $revnum <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_revision_root ($fs, $revnum) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Determines what kind of item lives at path in a given repository fsroot
 * @link http://php.net/manual/en/function.svn-fs-check-path.php
 * @param resource $fsroot <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return int What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_check_path ($fsroot, $path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Fetches the value of a named property
 * @link http://php.net/manual/en/function.svn-fs-revision-prop.php
 * @param resource $fs <p>
 * Its description
 * </p>
 * @param int $revnum <p>
 * Its description
 * </p>
 * @param string $propname <p>
 * Its description
 * </p>
 * @return string What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_revision_prop ($fs, $revnum, $propname) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Enumerates the directory entries under path; returns a hash of dir names to file type
 * @link http://php.net/manual/en/function.svn-fs-dir-entries.php
 * @param resource $fsroot <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return array What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_dir_entries ($fsroot, $path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the revision in which path under fsroot was created
 * @link http://php.net/manual/en/function.svn-fs-node-created-rev.php
 * @param resource $fsroot <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return int What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_node_created_rev ($fsroot, $path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the number of the youngest revision in the filesystem
 * @link http://php.net/manual/en/function.svn-fs-youngest-rev.php
 * @param resource $fs <p>
 * Its description
 * </p>
 * @return int What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_youngest_rev ($fs) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns a stream to access the contents of a file from a given version of the fs
 * @link http://php.net/manual/en/function.svn-fs-file-contents.php
 * @param resource $fsroot <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_file_contents ($fsroot, $path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the length of a file from a given version of the fs
 * @link http://php.net/manual/en/function.svn-fs-file-length.php
 * @param resource $fsroot <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return int What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_file_length ($fsroot, $path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Creates and returns a transaction root
 * @link http://php.net/manual/en/function.svn-fs-txn-root.php
 * @param resource $txn <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_txn_root ($txn) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Creates a new empty file, returns true if all is ok, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-make-file.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_make_file ($root, $path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Creates a new empty directory, returns true if all is ok, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-make-dir.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_make_dir ($root, $path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Creates and returns a stream that will be used to replace
 * @link http://php.net/manual/en/function.svn-fs-apply-text.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_apply_text ($root, $path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Copies a file or a directory, returns true if all is ok, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-copy.php
 * @param resource $from_root <p>
 * Its description
 * </p>
 * @param string $from_path <p>
 * Its description
 * </p>
 * @param resource $to_root <p>
 * Its description
 * </p>
 * @param string $to_path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_copy ($from_root, $from_path, $to_root, $to_path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Deletes a file or a directory, return true if all is ok, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-delete.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_delete ($root, $path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Create a new transaction
 * @link http://php.net/manual/en/function.svn-fs-begin-txn2.php
 * @param resource $repos <p>
 * Its description
 * </p>
 * @param int $rev <p>
 * Its description
 * </p>
 * @return resource What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_begin_txn2 ($repos, $rev) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Return true if the path points to a directory, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-is-dir.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_is_dir ($root, $path) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Return true if the path points to a file, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-is-file.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_is_file ($root, $path) {}

/**
 * (PECL svn &gt;= 0.1.0)<br/>
 * Returns the value of a property for a node
 * @link http://php.net/manual/en/function.svn-fs-node-prop.php
 * @param resource $fsroot <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @param string $propname <p>
 * Its description
 * </p>
 * @return string What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_node_prop ($fsroot, $path, $propname) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Return true if everything is ok, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-change-node-prop.php
 * @param resource $root <p>
 * Its description
 * </p>
 * @param string $path <p>
 * Its description
 * </p>
 * @param string $name <p>
 * Its description
 * </p>
 * @param string $value <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_change_node_prop ($root, $path, $name, $value) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Return true if content is different, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-contents-changed.php
 * @param resource $root1 <p>
 * Its description
 * </p>
 * @param string $path1 <p>
 * Its description
 * </p>
 * @param resource $root2 <p>
 * Its description
 * </p>
 * @param string $path2 <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_contents_changed ($root1, $path1, $root2, $path2) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Return true if props are different, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-props-changed.php
 * @param resource $root1 <p>
 * Its description
 * </p>
 * @param string $path1 <p>
 * Its description
 * </p>
 * @param resource $root2 <p>
 * Its description
 * </p>
 * @param string $path2 <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_props_changed ($root1, $path1, $root2, $path2) {}

/**
 * (PECL svn &gt;= 0.2.0)<br/>
 * Abort a transaction, returns true if everything is okay, false otherwise
 * @link http://php.net/manual/en/function.svn-fs-abort-txn.php
 * @param resource $txn <p>
 * Its description
 * </p>
 * @return bool What the function returns, first on success, then on failure. See
 * also the &amp;return.success; entity
 */
function svn_fs_abort_txn ($txn) {}


/**
 * Property for default username to use when performing basic authentication
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_AUTH_PARAM_DEFAULT_USERNAME', "svn:auth:username");

/**
 * Property for default password to use when performing basic authentication
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_AUTH_PARAM_DEFAULT_PASSWORD', "svn:auth:password");
define ('SVN_AUTH_PARAM_NON_INTERACTIVE', "svn:auth:non-interactive");
define ('SVN_AUTH_PARAM_DONT_STORE_PASSWORDS', "svn:auth:dont-store-passwords");
define ('SVN_AUTH_PARAM_NO_AUTH_CACHE', "svn:auth:no-auth-cache");
define ('SVN_AUTH_PARAM_SSL_SERVER_FAILURES', "svn:auth:ssl:failures");
define ('SVN_AUTH_PARAM_SSL_SERVER_CERT_INFO', "svn:auth:ssl:cert-info");
define ('SVN_AUTH_PARAM_CONFIG', "svn:auth:config-category-servers");
define ('SVN_AUTH_PARAM_SERVER_GROUP', "svn:auth:server-group");
define ('SVN_AUTH_PARAM_CONFIG_DIR', "svn:auth:config-dir");

/**
 * Custom property for ignoring SSL cert verification errors
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS', "php:svn:auth:ignore-ssl-verify-errors");

/**
 * Configuration key that determines filesystem type
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_FS_CONFIG_FS_TYPE', "fs-type");

/**
 * Filesystem is Berkeley-DB implementation
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_FS_TYPE_BDB', "bdb");

/**
 * Filesystem is native-filesystem implementation
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_FS_TYPE_FSFS', "fsfs");

/**
 * svn:date
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_PROP_REVISION_DATE', "svn:date");

/**
 * svn:original-date
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_PROP_REVISION_ORIG_DATE', "svn:original-date");

/**
 * svn:author
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_PROP_REVISION_AUTHOR', "svn:author");

/**
 * svn:log
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_PROP_REVISION_LOG', "svn:log");
define ('SVN_REVISION_INITIAL', 1);

/**
 * Magic number (-1) specifying the HEAD revision
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_REVISION_HEAD', -1);
define ('SVN_REVISION_BASE', -2);
define ('SVN_REVISION_COMMITTED', -3);
define ('SVN_REVISION_PREV', -4);
define ('SVN_REVISION_UNSPECIFIED', -5);
define ('SVN_NON_RECURSIVE', 1);
define ('SVN_DISCOVER_CHANGED_PATHS', 2);
define ('SVN_OMIT_MESSAGES', 4);
define ('SVN_STOP_ON_COPY', 8);
define ('SVN_ALL', 16);
define ('SVN_SHOW_UPDATES', 32);
define ('SVN_NO_IGNORE', 64);

/**
 * Status does not exist
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_NONE', 1);

/**
 * Item is not versioned in working copy
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_UNVERSIONED', 2);

/**
 * Item exists, nothing else is happening
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_NORMAL', 3);

/**
 * Item is scheduled for addition
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_ADDED', 4);

/**
 * Item is versioned but missing from the working copy
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_MISSING', 5);

/**
 * Item is scheduled for deletion
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_DELETED', 6);

/**
 * Item was deleted and then re-added
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_REPLACED', 7);

/**
 * Item (text or properties) was modified
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_MODIFIED', 8);

/**
 * Item's local modifications were merged with repository modifications
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_MERGED', 9);

/**
 * Item's local modifications conflicted with repository modifications
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_CONFLICTED', 10);

/**
 * Item is unversioned but configured to be ignored
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_IGNORED', 11);

/**
 * Unversioned item is in the way of a versioned resource
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_OBSTRUCTED', 12);

/**
 * Unversioned path that is populated using svn:externals
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_EXTERNAL', 13);

/**
 * Directory does not contain complete entries list
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_WC_STATUS_INCOMPLETE', 14);

/**
 * Absent
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_NODE_NONE', 0);

/**
 * File
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_NODE_FILE', 1);

/**
 * Directory
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_NODE_DIR', 2);

/**
 * Something Subversion cannot identify
 * @link http://php.net/manual/en/svn.constants.php
 */
define ('SVN_NODE_UNKNOWN', 3);
define ('SVN_WC_SCHEDULE_NORMAL', 0);
define ('SVN_WC_SCHEDULE_ADD', 1);
define ('SVN_WC_SCHEDULE_DELETE', 2);
define ('SVN_WC_SCHEDULE_REPLACE', 3);

// End of svn v.1.0.1
?>
