<?php

// Start of sockets v.

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Runs the select() system call on the given arrays of sockets with a specified timeout
 * @link http://php.net/manual/en/function.socket-select.php
 * @param array $read <p>
 * The sockets listed in the <i>read</i> array will be
 * watched to see if characters become available for reading (more
 * precisely, to see if a read will not block - in particular, a socket
 * resource is also ready on end-of-file, in which case a
 * <b>socket_read</b> will return a zero length string).
 * </p>
 * @param array $write <p>
 * The sockets listed in the <i>write</i> array will be
 * watched to see if a write will not block.
 * </p>
 * @param array $except <p>
 * The sockets listed in the <i>except</i> array will be
 * watched for exceptions.
 * </p>
 * @param int $tv_sec <p>
 * The <i>tv_sec</i> and <i>tv_usec</i>
 * together form the timeout parameter. The
 * timeout is an upper bound on the amount of time
 * elapsed before <b>socket_select</b> return.
 * <i>tv_sec</i> may be zero , causing
 * <b>socket_select</b> to return immediately. This is useful
 * for polling. If <i>tv_sec</i> is <b>NULL</b> (no timeout),
 * <b>socket_select</b> can block indefinitely.
 * </p>
 * @param int $tv_usec [optional]
 * @return int On success <b>socket_select</b> returns the number of
 * socket resources contained in the modified arrays, which may be zero if
 * the timeout expires before anything interesting happens. On error <b>FALSE</b>
 * is returned. The error code can be retrieved with
 * <b>socket_last_error</b>.
 * </p>
 * <p>
 * Be sure to use the === operator when checking for an
 * error. Since the <b>socket_select</b> may return 0 the
 * comparison with == would evaluate to <b>TRUE</b>:
 * Understanding <b>socket_select</b>'s result
 * <code>
 * $e = NULL;
 * if (false === socket_select($r, $w, $e, 0)) {
 * echo "socket_select() failed, reason: " .
 * socket_strerror(socket_last_error()) . "\n";
 * }
 * </code>
 */
function socket_select (array &$read, array &$write, array &$except, $tv_sec, $tv_usec = 0) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Create a socket (endpoint for communication)
 * @link http://php.net/manual/en/function.socket-create.php
 * @param int $domain <p>
 * The <i>domain</i> parameter specifies the protocol
 * family to be used by the socket.
 * </p>
 * <table>
 * Available address/protocol families
 * <tr valign="top">
 * <td>Domain</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td><b>AF_INET</b></td>
 * <td>
 * IPv4 Internet based protocols. TCP and UDP are common protocols of
 * this protocol family.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>AF_INET6</b></td>
 * <td>
 * IPv6 Internet based protocols. TCP and UDP are common protocols of
 * this protocol family.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>AF_UNIX</b></td>
 * <td>
 * Local communication protocol family. High efficiency and low
 * overhead make it a great form of IPC (Interprocess Communication).
 * </td>
 * </tr>
 * </table>
 * @param int $type <p>
 * The <i>type</i> parameter selects the type of communication
 * to be used by the socket.
 * </p>
 * <table>
 * Available socket types
 * <tr valign="top">
 * <td>Type</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td><b>SOCK_STREAM</b></td>
 * <td>
 * Provides sequenced, reliable, full-duplex, connection-based byte streams.
 * An out-of-band data transmission mechanism may be supported.
 * The TCP protocol is based on this socket type.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SOCK_DGRAM</b></td>
 * <td>
 * Supports datagrams (connectionless, unreliable messages of a fixed maximum length).
 * The UDP protocol is based on this socket type.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SOCK_SEQPACKET</b></td>
 * <td>
 * Provides a sequenced, reliable, two-way connection-based data transmission path for
 * datagrams of fixed maximum length; a consumer is required to read an
 * entire packet with each read call.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SOCK_RAW</b></td>
 * <td>
 * Provides raw network protocol access. This special type of socket
 * can be used to manually construct any type of protocol. A common use
 * for this socket type is to perform ICMP requests (like ping).
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SOCK_RDM</b></td>
 * <td>
 * Provides a reliable datagram layer that does not guarantee ordering.
 * This is most likely not implemented on your operating system.
 * </td>
 * </tr>
 * </table>
 * @param int $protocol <p>
 * The <i>protocol</i> parameter sets the specific
 * protocol within the specified <i>domain</i> to be used
 * when communicating on the returned socket. The proper value can be
 * retrieved by name by using <b>getprotobyname</b>. If
 * the desired protocol is TCP, or UDP the corresponding constants
 * <b>SOL_TCP</b>, and <b>SOL_UDP</b>
 * can also be used.
 * </p>
 * <table>
 * Common protocols
 * <tr valign="top">
 * <td>Name</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>icmp</td>
 * <td>
 * The Internet Control Message Protocol is used primarily by gateways
 * and hosts to report errors in datagram communication. The "ping"
 * command (present in most modern operating systems) is an example
 * application of ICMP.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>udp</td>
 * <td>
 * The User Datagram Protocol is a connectionless, unreliable,
 * protocol with fixed record lengths. Due to these aspects, UDP
 * requires a minimum amount of protocol overhead.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>tcp</td>
 * <td>
 * The Transmission Control Protocol is a reliable, connection based,
 * stream oriented, full duplex protocol. TCP guarantees that all data packets
 * will be received in the order in which they were sent. If any packet is somehow
 * lost during communication, TCP will automatically retransmit the packet until
 * the destination host acknowledges that packet. For reliability and performance
 * reasons, the TCP implementation itself decides the appropriate octet boundaries
 * of the underlying datagram communication layer. Therefore, TCP applications must
 * allow for the possibility of partial record transmission.
 * </td>
 * </tr>
 * </table>
 * @return resource <b>socket_create</b> returns a socket resource on success,
 * or <b>FALSE</b> on error. The actual error code can be retrieved by calling
 * <b>socket_last_error</b>. This error code may be passed to
 * <b>socket_strerror</b> to get a textual explanation of the
 * error.
 */
function socket_create ($domain, $type, $protocol) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Opens a socket on port to accept connections
 * @link http://php.net/manual/en/function.socket-create-listen.php
 * @param int $port <p>
 * The port on which to listen on all interfaces.
 * </p>
 * @param int $backlog [optional] <p>
 * The <i>backlog</i> parameter defines the maximum length
 * the queue of pending connections may grow to.
 * <b>SOMAXCONN</b> may be passed as
 * <i>backlog</i> parameter, see
 * <b>socket_listen</b> for more information.
 * </p>
 * @return resource <b>socket_create_listen</b> returns a new socket resource
 * on success or <b>FALSE</b> on error. The error code can be retrieved with
 * <b>socket_last_error</b>. This code may be passed to
 * <b>socket_strerror</b> to get a textual explanation of the
 * error.
 */
function socket_create_listen ($port, $backlog = 128) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Creates a pair of indistinguishable sockets and stores them in an array
 * @link http://php.net/manual/en/function.socket-create-pair.php
 * @param int $domain <p>
 * The <i>domain</i> parameter specifies the protocol
 * family to be used by the socket. See <b>socket_create</b>
 * for the full list.
 * </p>
 * @param int $type <p>
 * The <i>type</i> parameter selects the type of communication
 * to be used by the socket. See <b>socket_create</b> for the
 * full list.
 * </p>
 * @param int $protocol <p>
 * The <i>protocol</i> parameter sets the specific
 * protocol within the specified <i>domain</i> to be used
 * when communicating on the returned socket. The proper value can be retrieved by
 * name by using <b>getprotobyname</b>. If
 * the desired protocol is TCP, or UDP the corresponding constants
 * <b>SOL_TCP</b>, and <b>SOL_UDP</b>
 * can also be used.
 * </p>
 * <p>
 * See <b>socket_create</b> for the full list of supported
 * protocols.
 * </p>
 * @param array $fd <p>
 * Reference to an array in which the two socket resources will be inserted.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
 */
function socket_create_pair ($domain, $type, $protocol, array &$fd) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Accepts a connection on a socket
 * @link http://php.net/manual/en/function.socket-accept.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>.
 * </p>
 * @return resource a new socket resource on success, or <b>FALSE</b> on error. The actual
 * error code can be retrieved by calling
 * <b>socket_last_error</b>. This error code may be passed to
 * <b>socket_strerror</b> to get a textual explanation of the
 * error.
 */
function socket_accept ($socket) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Sets nonblocking mode for file descriptor fd
 * @link http://php.net/manual/en/function.socket-set-nonblock.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
 */
function socket_set_nonblock ($socket) {}

/**
 * (PHP 4 &gt;= 4.2.0, PHP 5)<br/>
 * Sets blocking mode on a socket resource
 * @link http://php.net/manual/en/function.socket-set-block.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
 */
function socket_set_block ($socket) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Listens for a connection on a socket
 * @link http://php.net/manual/en/function.socket-listen.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>.
 * </p>
 * @param int $backlog [optional] <p>
 * A maximum of <i>backlog</i> incoming connections will be
 * queued for processing. If a connection request arrives with the queue
 * full the client may receive an error with an indication of
 * ECONNREFUSED, or, if the underlying protocol supports
 * retransmission, the request may be ignored so that retries may succeed.
 * </p>
 * <p>
 * The maximum number passed to the <i>backlog</i>
 * parameter highly depends on the underlying platform. On Linux, it is
 * silently truncated to <b>SOMAXCONN</b>. On win32, if
 * passed <b>SOMAXCONN</b>, the underlying service provider
 * responsible for the socket will set the backlog to a maximum
 * reasonable value. There is no standard provision to
 * find out the actual backlog value on this platform.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure. The error code can be retrieved with
 * <b>socket_last_error</b>. This code may be passed to
 * <b>socket_strerror</b> to get a textual explanation of the
 * error.
 */
function socket_listen ($socket, $backlog = 0) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Closes a socket resource
 * @link http://php.net/manual/en/function.socket-close.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @return void No value is returned.
 */
function socket_close ($socket) {}

/**
 * (PHP 5 &gt;=5.5.0)<br/>
 * Calculate message buffer size
 * @link http://www.php.net/manual/en/function.socket-cmsg-space.php
 * @param int $level
 * @param int $type
 */
function socket_cmsg_space ($level , $type ) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Write to a socket
 * @link http://php.net/manual/en/function.socket-write.php
 * @param resource $socket
 * @param string $buffer <p>
 * The buffer to be written.
 * </p>
 * @param int $length [optional] <p>
 * The optional parameter <i>length</i> can specify an
 * alternate length of bytes written to the socket. If this length is
 * greater then the buffer length, it is silently truncated to the length
 * of the buffer.
 * </p>
 * @return int the number of bytes successfully written to the socket or <b>FALSE</b> on failure.
 * The error code can be retrieved with
 * <b>socket_last_error</b>. This code may be passed to
 * <b>socket_strerror</b> to get a textual explanation of the
 * error.
 * </p>
 * <p>
 * It is perfectly valid for <b>socket_write</b> to
 * return zero which means no bytes have been written. Be sure to use the
 * === operator to check for <b>FALSE</b> in case of an
 * error.
 */
function socket_write ($socket, $buffer, $length = 0) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Reads a maximum of length bytes from a socket
 * @link http://php.net/manual/en/function.socket-read.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @param int $length <p>
 * The maximum number of bytes read is specified by the
 * <i>length</i> parameter. Otherwise you can use
 * <b>&#92;r</b>, <b>&#92;n</b>,
 * or <b>&#92;0</b> to end reading (depending on the <i>type</i>
 * parameter, see below).
 * </p>
 * @param int $type [optional] <p>
 * Optional <i>type</i> parameter is a named constant:
 * <b>PHP_BINARY_READ</b> (Default) - use the system
 * recv() function. Safe for reading binary data.
 * @return string <b>socket_read</b> returns the data as a string on success,
 * or <b>FALSE</b> on error (including if the remote host has closed the
 * connection). The error code can be retrieved with
 * <b>socket_last_error</b>. This code may be passed to
 * <b>socket_strerror</b> to get a textual representation of
 * the error.
 * </p>
 * <p>
 * <b>socket_read</b> returns a zero length string ("")
 * when there is no more data to read.
 */
function socket_read ($socket, $length, $type = PHP_BINARY_READ) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Queries the local side of the given socket which may either result in host/port or in a Unix filesystem path, dependent on its type
 * @link http://php.net/manual/en/function.socket-getsockname.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @param string $addr <p>
 * If the given socket is of type <b>AF_INET</b>
 * or <b>AF_INET6</b>, <b>socket_getsockname</b>
 * will return the local IP address in appropriate notation (e.g.
 * 127.0.0.1 or fe80::1) in the
 * <i>address</i> parameter and, if the optional
 * <i>port</i> parameter is present, also the associated port.
 * </p>
 * <p>
 * If the given socket is of type <b>AF_UNIX</b>,
 * <b>socket_getsockname</b> will return the Unix filesystem
 * path (e.g. /var/run/daemon.sock) in the
 * <i>address</i> parameter.
 * </p>
 * @param int $port [optional] <p>
 * If provided, this will hold the associated port.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure. <b>socket_getsockname</b> may also return
 * <b>FALSE</b> if the socket type is not any of <b>AF_INET</b>,
 * <b>AF_INET6</b>, or <b>AF_UNIX</b>, in which
 * case the last socket error code is not updated.
 */
function socket_getsockname ($socket, &$addr, &$port = null) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Queries the remote side of the given socket which may either result in host/port or in a Unix filesystem path, dependent on its type
 * @link http://php.net/manual/en/function.socket-getpeername.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @param string $address <p>
 * If the given socket is of type <b>AF_INET</b> or
 * <b>AF_INET6</b>, <b>socket_getpeername</b>
 * will return the peers (remote) IP address in
 * appropriate notation (e.g. 127.0.0.1 or
 * fe80::1) in the <i>address</i>
 * parameter and, if the optional <i>port</i> parameter is
 * present, also the associated port.
 * </p>
 * <p>
 * If the given socket is of type <b>AF_UNIX</b>,
 * <b>socket_getpeername</b> will return the Unix filesystem
 * path (e.g. /var/run/daemon.sock) in the
 * <i>address</i> parameter.
 * </p>
 * @param int $port [optional] <p>
 * If given, this will hold the port associated to
 * <i>address</i>.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure. <b>socket_getpeername</b> may also return
 * <b>FALSE</b> if the socket type is not any of <b>AF_INET</b>,
 * <b>AF_INET6</b>, or <b>AF_UNIX</b>, in which
 * case the last socket error code is not updated.
 */
function socket_getpeername ($socket, &$address, &$port = null) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Initiates a connection on a socket
 * @link http://php.net/manual/en/function.socket-connect.php
 * @param resource $socket
 * @param string $address <p>
 * The <i>address</i> parameter is either an IPv4 address
 * in dotted-quad notation (e.g. 127.0.0.1) if
 * <i>socket</i> is <b>AF_INET</b>, a valid
 * IPv6 address (e.g. ::1) if IPv6 support is enabled and
 * <i>socket</i> is <b>AF_INET6</b>
 * or the pathname of a Unix domain socket, if the socket family is
 * <b>AF_UNIX</b>.
 * </p>
 * @param int $port [optional] <p>
 * The <i>port</i> parameter is only used and is mandatory
 * when connecting to an <b>AF_INET</b> or an
 * <b>AF_INET6</b> socket, and designates
 * the port on the remote host to which a connection should be made.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure. The error code can be retrieved with
 * <b>socket_last_error</b>. This code may be passed to
 * <b>socket_strerror</b> to get a textual explanation of the
 * error.
 * </p>
 * <p>
 * If the socket is non-blocking then this function returns <b>FALSE</b> with an
 * error Operation now in progress.
 */
function socket_connect ($socket, $address, $port = 0) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Return a string describing a socket error
 * @link http://php.net/manual/en/function.socket-strerror.php
 * @param int $errno <p>
 * A valid socket error number, likely produced by
 * <b>socket_last_error</b>.
 * </p>
 * @return string the error message associated with the <i>errno</i>
 * parameter.
 */
function socket_strerror ($errno) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Binds a name to a socket
 * @link http://php.net/manual/en/function.socket-bind.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>.
 * </p>
 * @param string $address <p>
 * If the socket is of the <b>AF_INET</b> family, the
 * <i>address</i> is an IP in dotted-quad notation
 * (e.g. 127.0.0.1).
 * </p>
 * <p>
 * If the socket is of the <b>AF_UNIX</b> family, the
 * <i>address</i> is the path of a
 * Unix-domain socket (e.g. /tmp/my.sock).
 * </p>
 * @param int $port [optional] <p>
 * The <i>port</i> parameter is only used when
 * binding an <b>AF_INET</b> socket, and designates
 * the port on which to listen for connections.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
 * </p>
 * <p>
 * The error code can be retrieved with <b>socket_last_error</b>.
 * This code may be passed to <b>socket_strerror</b> to get a
 * textual explanation of the error.
 */
function socket_bind ($socket, $address, $port = 0) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Receives data from a connected socket
 * @link http://php.net/manual/en/function.socket-recv.php
 * @param resource $socket <p>
 * The <i>socket</i> must be a socket resource previously
 * created by socket_create().
 * </p>
 * @param string $buf <p>
 * The data received will be fetched to the variable specified with
 * <i>buf</i>. If an error occurs, if the
 * connection is reset, or if no data is
 * available, <i>buf</i> will be set to <b>NULL</b>.
 * </p>
 * @param int $len <p>
 * Up to <i>len</i> bytes will be fetched from remote host.
 * </p>
 * @param int $flags <p>
 * The value of <i>flags</i> can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 * </p>
 * <table>
 * Possible values for <i>flags</i>
 * <tr valign="top">
 * <td>Flag</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_OOB</b></td>
 * <td>
 * Process out-of-band data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_PEEK</b></td>
 * <td>
 * Receive data from the beginning of the receive queue without
 * removing it from the queue.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_WAITALL</b></td>
 * <td>
 * Block until at least <i>len</i> are received.
 * However, if a signal is caught or the remote host disconnects, the
 * function may return less data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_DONTWAIT</b></td>
 * <td>
 * With this flag set, the function returns even if it would normally
 * have blocked.
 * </td>
 * </tr>
 * </table>
 * @return int <b>socket_recv</b> returns the number of bytes received,
 * or <b>FALSE</b> if there was an error. The actual error code can be retrieved by
 * calling <b>socket_last_error</b>. This error code may be
 * passed to <b>socket_strerror</b> to get a textual explanation
 * of the error.
 */
function socket_recv ($socket, &$buf, $len, $flags) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Sends data to a connected socket
 * @link http://php.net/manual/en/function.socket-send.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @param string $buf <p>
 * A buffer containing the data that will be sent to the remote host.
 * </p>
 * @param int $len <p>
 * The number of bytes that will be sent to the remote host from
 * <i>buf</i>.
 * </p>
 * @param int $flags <p>
 * The value of <i>flags</i> can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 * <table>
 * Possible values for <i>flags</i>
 * <tr valign="top">
 * <td><b>MSG_OOB</b></td>
 * <td>
 * Send OOB (out-of-band) data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_EOR</b></td>
 * <td>
 * Indicate a record mark. The sent data completes the record.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_EOF</b></td>
 * <td>
 * Close the sender side of the socket and include an appropriate
 * notification of this at the end of the sent data. The sent data
 * completes the transaction.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_DONTROUTE</b></td>
 * <td>
 * Bypass routing, use direct interface.
 * </td>
 * </tr>
 * </table>
 * </p>
 * @return int <b>socket_send</b> returns the number of bytes sent, or <b>FALSE</b> on error.
 */
function socket_send ($socket, $buf, $len, $flags) {}

/**
 * (PHP 5 &gt;=5.5.0)<br/>
 * Send a message
 * @link http://www.php.net/manual/en/function.socket-sendmsg.php
 * @param resource $socket
 * @param array $message
 * @param int $flags
 * @return int
 */
function socket_sendmsg ($socket, array $message, $flags ) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Receives data from a socket whether or not it is connection-oriented
 * @link http://php.net/manual/en/function.socket-recvfrom.php
 * @param resource $socket <p>
 * The <i>socket</i> must be a socket resource previously
 * created by socket_create().
 * </p>
 * @param string $buf <p>
 * The data received will be fetched to the variable specified with
 * <i>buf</i>.
 * </p>
 * @param int $len <p>
 * Up to <i>len</i> bytes will be fetched from remote host.
 * </p>
 * @param int $flags <p>
 * The value of <i>flags</i> can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 * </p>
 * <table>
 * Possible values for <i>flags</i>
 * <tr valign="top">
 * <td>Flag</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_OOB</b></td>
 * <td>
 * Process out-of-band data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_PEEK</b></td>
 * <td>
 * Receive data from the beginning of the receive queue without
 * removing it from the queue.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_WAITALL</b></td>
 * <td>
 * Block until at least <i>len</i> are received.
 * However, if a signal is caught or the remote host disconnects, the
 * function may return less data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_DONTWAIT</b></td>
 * <td>
 * With this flag set, the function returns even if it would normally
 * have blocked.
 * </td>
 * </tr>
 * </table>
 * @param string $name <p>
 * If the socket is of the type <b>AF_UNIX</b> type,
 * <i>name</i> is the path to the file. Else, for
 * unconnected sockets, <i>name</i> is the IP address of,
 * the remote host, or <b>NULL</b> if the socket is connection-oriented.
 * </p>
 * @param int $port [optional] <p>
 * This argument only applies to <b>AF_INET</b> and
 * <b>AF_INET6</b> sockets, and specifies the remote port
 * from which the data is received. If the socket is connection-oriented,
 * <i>port</i> will be <b>NULL</b>.
 * </p>
 * @return int <b>socket_recvfrom</b> returns the number of bytes received,
 * or <b>FALSE</b> if there was an error. The actual error code can be retrieved by
 * calling <b>socket_last_error</b>. This error code may be
 * passed to <b>socket_strerror</b> to get a textual explanation
 * of the error.
 */
function socket_recvfrom ($socket, &$buf, $len, $flags, &$name, &$port = null) {}

/**
 * (PHP 5 &gt;=5.5.0)<br/>
 * Read a message
 * @link http://www.php.net/manual/en/function.socket-recvmsg.php
 * @param resource $socket
 * @param string $message
 * @param int $flags [optional]
 * @return int
 */
function socket_recvmsg ($socket , $message, $flags) {}
/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Sends a message to a socket, whether it is connected or not
 * @link http://php.net/manual/en/function.socket-sendto.php
 * @param resource $socket <p>
 * A valid socket resource created using <b>socket_create</b>.
 * </p>
 * @param string $buf <p>
 * The sent data will be taken from buffer <i>buf</i>.
 * </p>
 * @param int $len <p>
 * <i>len</i> bytes from <i>buf</i> will be
 * sent.
 * </p>
 * @param int $flags <p>
 * The value of <i>flags</i> can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 * <table>
 * Possible values for <i>flags</i>
 * <tr valign="top">
 * <td><b>MSG_OOB</b></td>
 * <td>
 * Send OOB (out-of-band) data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_EOR</b></td>
 * <td>
 * Indicate a record mark. The sent data completes the record.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_EOF</b></td>
 * <td>
 * Close the sender side of the socket and include an appropriate
 * notification of this at the end of the sent data. The sent data
 * completes the transaction.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MSG_DONTROUTE</b></td>
 * <td>
 * Bypass routing, use direct interface.
 * </td>
 * </tr>
 * </table>
 * </p>
 * @param string $addr <p>
 * IP address of the remote host.
 * </p>
 * @param int $port [optional] <p>
 * <i>port</i> is the remote port number at which the data
 * will be sent.
 * </p>
 * @return int <b>socket_sendto</b> returns the number of bytes sent to the
 * remote host, or <b>FALSE</b> if an error occurred.
 */
function socket_sendto ($socket, $buf, $len, $flags, $addr, $port = 0) {}

/**
 * (PHP 4 &gt;= 4.3.0, PHP 5)<br/>
 * Gets socket options for the socket
 * @link http://php.net/manual/en/function.socket-get-option.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @param int $level <p>
 * The <i>level</i> parameter specifies the protocol
 * level at which the option resides. For example, to retrieve options at
 * the socket level, a <i>level</i> parameter of
 * <b>SOL_SOCKET</b> would be used. Other levels, such as
 * <b>TCP</b>, can be used by
 * specifying the protocol number of that level. Protocol numbers can be
 * found by using the <b>getprotobyname</b> function.
 * </p>
 * @param int $optname <table>
 * Available Socket Options
 * <tr valign="top">
 * <td>Option</td>
 * <td>Description</td>
 * <td>Type</td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_DEBUG</b></td>
 * <td>
 * Reports whether debugging information is being recorded.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_BROADCAST</b></td>
 * <td>
 * Reports whether transmission of broadcast messages is supported.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_REUSEADDR</b></td>
 * <td>
 * Reports whether local addresses can be reused.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_KEEPALIVE</b></td>
 * <td>
 * Reports whether connections are kept active with periodic transmission
 * of messages. If the connected socket fails to respond to these messages,
 * the connection is broken and processes writing to that socket are notified
 * with a SIGPIPE signal.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_LINGER</b></td>
 * <td>
 * <p>
 * Reports whether the <i>socket</i> lingers on
 * <b>socket_close</b> if data is present. By default,
 * when the socket is closed, it attempts to send all unsent data.
 * In the case of a connection-oriented socket,
 * <b>socket_close</b> will wait for its peer to
 * acknowledge the data.
 * </p>
 * <p>
 * If l_onoff is non-zero and
 * l_linger is zero, all the
 * unsent data will be discarded and RST (reset) is sent to the
 * peer in the case of a connection-oriented socket.
 * </p>
 * <p>
 * On the other hand, if l_onoff is
 * non-zero and l_linger is non-zero,
 * <b>socket_close</b> will block until all the data
 * is sent or the time specified in l_linger
 * elapses. If the socket is non-blocking,
 * <b>socket_close</b> will fail and return an error.
 * </p>
 * </td>
 * <td>
 * array. The array will contain two keys:
 * l_onoff and
 * l_linger.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_OOBINLINE</b></td>
 * <td>
 * Reports whether the <i>socket</i> leaves out-of-band data inline.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_SNDBUF</b></td>
 * <td>
 * Reports the size of the send buffer.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_RCVBUF</b></td>
 * <td>
 * Reports the size of the receive buffer.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_ERROR</b></td>
 * <td>
 * Reports information about error status and clears it.
 * </td>
 * <td>
 * int (cannot be set by <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_TYPE</b></td>
 * <td>
 * Reports the <i>socket</i> type (e.g.
 * <b>SOCK_STREAM</b>).
 * </td>
 * <td>
 * int (cannot be set by <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_DONTROUTE</b></td>
 * <td>
 * Reports whether outgoing messages bypass the standard routing facilities.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_RCVLOWAT</b></td>
 * <td>
 * Reports the minimum number of bytes to process for <i>socket</i>
 * input operations.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_RCVTIMEO</b></td>
 * <td>
 * Reports the timeout value for input operations.
 * </td>
 * <td>
 * array. The array will contain two keys:
 * sec which is the seconds part on the timeout
 * value and usec which is the microsecond part
 * of the timeout value.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_SNDTIMEO</b></td>
 * <td>
 * Reports the timeout value specifying the amount of time that an output
 * function blocks because flow control prevents data from being sent.
 * </td>
 * <td>
 * array. The array will contain two keys:
 * sec which is the seconds part on the timeout
 * value and usec which is the microsecond part
 * of the timeout value.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>SO_SNDLOWAT</b></td>
 * <td>
 * Reports the minimum number of bytes to process for <i>socket</i> output operations.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>TCP_NODELAY</b></td>
 * <td>
 * Reports whether the Nagle TCP algorithm is disabled.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MCAST_JOIN_GROUP</b></td>
 * <td>
 * Joins a multicast group. (added in PHP 5.4)
 * </td>
 * <td>
 * array with keys "group", specifying
 * a string with an IPv4 or IPv6 multicast address and
 * "interface", specifying either an interface
 * number (type int) or a string with
 * the interface name, like "eth0".
 * 0 can be specified to indicate the interface
 * should be selected using routing rules. (can only be used in
 * <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MCAST_LEAVE_GROUP</b></td>
 * <td>
 * Leaves a multicast group. (added in PHP 5.4)
 * </td>
 * <td>
 * array. See <b>MCAST_JOIN_GROUP</b> for
 * more information. (can only be used in
 * <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MCAST_BLOCK_SOURCE</b></td>
 * <td>
 * Blocks packets arriving from a specific source to a specific
 * multicast group, which must have been previously joined.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same keys as
 * <b>MCAST_JOIN_GROUP</b>, plus one extra key,
 * source, which maps to a string
 * specifying an IPv4 or IPv6 address of the source to be blocked.
 * (can only be used in <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MCAST_UNBLOCK_SOURCE</b></td>
 * <td>
 * Unblocks (start receiving again) packets arriving from a specific
 * source address to a specific multicast group, which must have been
 * previously joined. (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same format as
 * <b>MCAST_BLOCK_SOURCE</b>.
 * (can only be used in <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MCAST_JOIN_SOURCE_GROUP</b></td>
 * <td>
 * Receive packets destined to a specific multicast group whose source
 * address matches a specific value. (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same format as
 * <b>MCAST_BLOCK_SOURCE</b>.
 * (can only be used in <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>MCAST_LEAVE_SOURCE_GROUP</b></td>
 * <td>
 * Stop receiving packets destined to a specific multicast group whose
 * soure address matches a specific value. (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same format as
 * <b>MCAST_BLOCK_SOURCE</b>.
 * (can only be used in <b>socket_set_option</b>)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>IP_MULTICAST_IF</b></td>
 * <td>
 * The outgoing interface for IPv4 multicast packets.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * Either int specifying the interface number or a
 * string with an interface name, like
 * eth0. The value 0 can be used to
 * indicate the routing table is to used in the interface selection.
 * The function <b>socket_get_option</b> returns an
 * interface index.
 * Note that, unlike the C API, this option does NOT take an IP
 * address. This eliminates the interface difference between
 * <b>IP_MULTICAST_IF</b> and
 * <b>IPV6_MULTICAST_IF</b>.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>IPV6_MULTICAST_IF</b></td>
 * <td>
 * The outgoing interface for IPv6 multicast packets.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * The same as <b>IP_MULTICAST_IF</b>.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>IP_MULTICAST_LOOP</b></td>
 * <td>
 * The multicast loopback policy for IPv4 packets, which
 * determines whether multicast packets sent by this socket also reach
 * receivers in the same host that have joined the same multicast group
 * on the outgoing interface used by this socket. This is the case by
 * default.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int (either 0 or
 * 1). For <b>socket_set_option</b>
 * any value will be accepted and will be converted to a boolean
 * following the usual PHP rules.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>IPV6_MULTICAST_LOOP</b></td>
 * <td>
 * Analogous to <b>IP_MULTICAST_LOOP</b>, but for IPv6.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int. See <b>IP_MULTICAST_LOOP</b>.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>IP_MULTICAST_TTL</b></td>
 * <td>
 * The time-to-live of outgoing IPv4 multicast packets. This should be
 * a value between 0 (don't leave the interface) and 255. The default
 * value is 1 (only the local network is reached).
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int between 0 and 255.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td><b>IPV6_MULTICAST_HOPS</b></td>
 * <td>
 * Analogous to <b>IP_MULTICAST_TTL</b>, but for IPv6
 * packets. The value -1 is also accepted, meaning the route default
 * should be used.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int between -1 and 255.
 * </td>
 * </tr>
 * </table>
 * @return mixed the value of the given option, or <b>FALSE</b> on errors.
 */
function socket_get_option ($socket, $level, $optname) {}

/**
 * (PHP 4 &gt;= 4.3.0, PHP 5)<br/>
 * Sets socket options for the socket
 * @link http://php.net/manual/en/function.socket-set-option.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>
 * or <b>socket_accept</b>.
 * </p>
 * @param int $level <p>
 * The <i>level</i> parameter specifies the protocol
 * level at which the option resides. For example, to retrieve options at
 * the socket level, a <i>level</i> parameter of
 * <b>SOL_SOCKET</b> would be used. Other levels, such as
 * TCP, can be used by specifying the protocol number of that level.
 * Protocol numbers can be found by using the
 * <b>getprotobyname</b> function.
 * </p>
 * @param int $optname <p>
 * The available socket options are the same as those for the
 * <b>socket_get_option</b> function.
 * </p>
 * @param mixed $optval <p>
 * The option value.
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
 */
function socket_set_option ($socket, $level, $optname, $optval) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Shuts down a socket for receiving, sending, or both
 * @link http://php.net/manual/en/function.socket-shutdown.php
 * @param resource $socket <p>
 * A valid socket resource created with <b>socket_create</b>.
 * </p>
 * @param int $how [optional] <p>
 * The value of <i>how</i> can be one of the following:
 * <table>
 * possible values for <i>how</i>
 * <tr valign="top">
 * <td>0</td>
 * <td>
 * Shutdown socket reading
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>1</td>
 * <td>
 * Shutdown socket writing
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>2</td>
 * <td>
 * Shutdown socket reading and writing
 * </td>
 * </tr>
 * </table>
 * </p>
 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
 */
function socket_shutdown ($socket, $how = 2) {}

/**
 * (PHP 4 &gt;= 4.1.0, PHP 5)<br/>
 * Returns the last error on the socket
 * @link http://php.net/manual/en/function.socket-last-error.php
 * @param resource $socket [optional] <p>
 * A valid socket resource created with <b>socket_create</b>.
 * </p>
 * @return int This function returns a socket error code.
 */
function socket_last_error ($socket = null) {}

/**
 * (PHP 4 &gt;= 4.2.0, PHP 5)<br/>
 * Clears the error on the socket or the last error code
 * @link http://php.net/manual/en/function.socket-clear-error.php
 * @param resource $socket [optional] <p>
 * A valid socket resource created with <b>socket_create</b>.
 * </p>
 * @return void No value is returned.
 */
function socket_clear_error ($socket = null) {}

/**
 * (PHP 4 &gt;= 5.4.0)<br/>
 * Import a stream
 * @link http://php.net/manual/en/function.socket-import-stream.php
 * @param resource $stream <p>
 * The stream resource to import.
 * </p>
 * @return resource <b>FALSE</b> or <b>NULL</b> on failure.
 */
function socket_import_stream ($stream) {}

/**
 * @param $socket
 * @param $level
 * @param $optname
 */
function socket_getopt ($socket, $level, $optname) {}

/**
 * @param $socket
 * @param $level
 * @param $optname
 * @param $optval
 */
function socket_setopt ($socket, $level, $optname, $optval) {}

define ('AF_UNIX', 1);
define ('AF_INET', 2);

/**
 * Only available if compiled with IPv6 support.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('AF_INET6', 10);
define ('SOCK_STREAM', 1);
define ('SOCK_DGRAM', 2);
define ('SOCK_RAW', 3);
define ('SOCK_SEQPACKET', 5);
define ('SOCK_RDM', 4);
define ('MSG_OOB', 1);
define ('MSG_WAITALL', 256);
define ('MSG_DONTWAIT', 64);
define ('MSG_PEEK', 2);
define ('MSG_DONTROUTE', 4);

/**
 * Not available on Windows platforms.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('MSG_EOR', 128);

/**
 * Not available on Windows platforms.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('MSG_EOF', 512);
define ('SO_DEBUG', 1);
define ('SO_REUSEADDR', 2);
define ('SO_KEEPALIVE', 9);
define ('SO_DONTROUTE', 5);
define ('SO_LINGER', 13);
define ('SO_BROADCAST', 6);
define ('SO_OOBINLINE', 10);
define ('SO_SNDBUF', 7);
define ('SO_RCVBUF', 8);
define ('SO_SNDLOWAT', 19);
define ('SO_RCVLOWAT', 18);
define ('SO_SNDTIMEO', 21);
define ('SO_RCVTIMEO', 20);
define ('SO_TYPE', 3);
define ('SO_ERROR', 4);
define ('SOL_SOCKET', 1);
define ('SOMAXCONN', 128);

/**
 * Used to disable Nagle TCP algorithm.
 * Added in PHP 5.2.7.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('TCP_NODELAY', 1);
define ('PHP_NORMAL_READ', 1);
define ('PHP_BINARY_READ', 2);
define ('MCAST_JOIN_GROUP', 42);
define ('MCAST_LEAVE_GROUP', 45);
define ('MCAST_BLOCK_SOURCE', 43);
define ('MCAST_UNBLOCK_SOURCE', 44);
define ('MCAST_JOIN_SOURCE_GROUP', 46);
define ('MCAST_LEAVE_SOURCE_GROUP', 47);
define ('IP_MULTICAST_IF', 32);
define ('IP_MULTICAST_TTL', 33);
define ('IP_MULTICAST_LOOP', 34);
define ('IPV6_MULTICAST_IF', 17);
define ('IPV6_MULTICAST_HOPS', 18);
define ('IPV6_MULTICAST_LOOP', 19);

/**
 * Operation not permitted.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPERM', 1);

/**
 * No such file or directory.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOENT', 2);

/**
 * Interrupted system call.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EINTR', 4);

/**
 * I/O error.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EIO', 5);

/**
 * No such device or address.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENXIO', 6);

/**
 * Arg list too long.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_E2BIG', 7);

/**
 * Bad file number.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADF', 9);

/**
 * Try again.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EAGAIN', 11);

/**
 * Out of memory.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOMEM', 12);

/**
 * Permission denied.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EACCES', 13);

/**
 * Bad address.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EFAULT', 14);

/**
 * Block device required.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTBLK', 15);

/**
 * Device or resource busy.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBUSY', 16);

/**
 * File exists.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EEXIST', 17);

/**
 * Cross-device link.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EXDEV', 18);

/**
 * No such device.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENODEV', 19);

/**
 * Not a directory.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTDIR', 20);

/**
 * Is a directory.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EISDIR', 21);

/**
 * Invalid argument.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EINVAL', 22);

/**
 * File table overflow.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENFILE', 23);

/**
 * Too many open files.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMFILE', 24);

/**
 * Not a typewriter.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTTY', 25);

/**
 * No space left on device.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOSPC', 28);

/**
 * Illegal seek.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESPIPE', 29);

/**
 * Read-only file system.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EROFS', 30);

/**
 * Too many links.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMLINK', 31);

/**
 * Broken pipe.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPIPE', 32);

/**
 * File name too long.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENAMETOOLONG', 36);

/**
 * No record locks available.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOLCK', 37);

/**
 * Function not implemented.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOSYS', 38);

/**
 * Directory not empty.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTEMPTY', 39);

/**
 * Too many symbolic links encountered.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ELOOP', 40);

/**
 * Operation would block.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EWOULDBLOCK', 11);

/**
 * No message of desired type.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOMSG', 42);

/**
 * Identifier removed.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EIDRM', 43);

/**
 * Channel number out of range.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECHRNG', 44);

/**
 * Level 2 not synchronized.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EL2NSYNC', 45);

/**
 * Level 3 halted.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EL3HLT', 46);

/**
 * Level 3 reset.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EL3RST', 47);

/**
 * Link number out of range.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ELNRNG', 48);

/**
 * Protocol driver not attached.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EUNATCH', 49);

/**
 * No CSI structure available.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOCSI', 50);

/**
 * Level 2 halted.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EL2HLT', 51);

/**
 * Invalid exchange.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADE', 52);

/**
 * Invalid request descriptor.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADR', 53);

/**
 * Exchange full.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EXFULL', 54);

/**
 * No anode.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOANO', 55);

/**
 * Invalid request code.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADRQC', 56);

/**
 * Invalid slot.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADSLT', 57);

/**
 * Device not a stream.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOSTR', 60);

/**
 * No data available.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENODATA', 61);

/**
 * Timer expired.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ETIME', 62);

/**
 * Out of streams resources.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOSR', 63);

/**
 * Machine is not on the network.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENONET', 64);

/**
 * Object is remote.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EREMOTE', 66);

/**
 * Link has been severed.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOLINK', 67);

/**
 * Advertise error.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EADV', 68);

/**
 * Srmount error.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESRMNT', 69);

/**
 * Communication error on send.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECOMM', 70);

/**
 * Protocol error.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPROTO', 71);

/**
 * Multihop attempted.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMULTIHOP', 72);

/**
 * Not a data message.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADMSG', 74);

/**
 * Name not unique on network.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTUNIQ', 76);

/**
 * File descriptor in bad state.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADFD', 77);

/**
 * Remote address changed.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EREMCHG', 78);

/**
 * Interrupted system call should be restarted.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ERESTART', 85);

/**
 * Streams pipe error.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESTRPIPE', 86);

/**
 * Too many users.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EUSERS', 87);

/**
 * Socket operation on non-socket.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTSOCK', 88);

/**
 * Destination address required.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EDESTADDRREQ', 89);

/**
 * Message too long.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMSGSIZE', 90);

/**
 * Protocol wrong type for socket.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPROTOTYPE', 91);
define ('SOCKET_ENOPROTOOPT', 92);

/**
 * Protocol not supported.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPROTONOSUPPORT', 93);

/**
 * Socket type not supported.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESOCKTNOSUPPORT', 94);

/**
 * Operation not supported on transport endpoint.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EOPNOTSUPP', 95);

/**
 * Protocol family not supported.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPFNOSUPPORT', 96);

/**
 * Address family not supported by protocol.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EAFNOSUPPORT', 97);
define ('SOCKET_EADDRINUSE', 98);

/**
 * Cannot assign requested address.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EADDRNOTAVAIL', 99);

/**
 * Network is down.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENETDOWN', 100);

/**
 * Network is unreachable.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENETUNREACH', 101);

/**
 * Network dropped connection because of reset.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENETRESET', 102);

/**
 * Software caused connection abort.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECONNABORTED', 103);

/**
 * Connection reset by peer.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECONNRESET', 104);

/**
 * No buffer space available.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOBUFS', 105);

/**
 * Transport endpoint is already connected.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EISCONN', 106);

/**
 * Transport endpoint is not connected.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTCONN', 107);

/**
 * Cannot send after transport endpoint shutdown.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESHUTDOWN', 108);

/**
 * Too many references: cannot splice.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ETOOMANYREFS', 109);

/**
 * Connection timed out.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ETIMEDOUT', 110);

/**
 * Connection refused.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECONNREFUSED', 111);

/**
 * Host is down.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EHOSTDOWN', 112);

/**
 * No route to host.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EHOSTUNREACH', 113);

/**
 * Operation already in progress.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EALREADY', 114);

/**
 * Operation now in progress.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EINPROGRESS', 115);

/**
 * Is a named type file.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EISNAM', 120);

/**
 * Remote I/O error.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EREMOTEIO', 121);

/**
 * Quota exceeded.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EDQUOT', 122);

/**
 * No medium found.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOMEDIUM', 123);

/**
 * Wrong medium type.
 * @link http://php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMEDIUMTYPE', 124);
define ('IPPROTO_IP', 0);
define ('IPPROTO_IPV6', 41);
define ('SOL_TCP', 6);
define ('SOL_UDP', 17);

// End of sockets v.
?>
