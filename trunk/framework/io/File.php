<?php

namespace sakiv\framework\io;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
        Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

/**
 * Contains file operations.
 *
 * @final This class cannot be extended.
 * @category sakiv\framework\io
 * @filesource /framework/io/file.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
final class File {

        public static function joinPaths() {
                $args = func_get_args();
                $paths = array();
                foreach( $args as $arg )
                {
                        $paths = array_merge( $paths, (array)$arg );
                }
                foreach( $paths as &$path )
                {
                        $path = trim( $path, '/' );
                }
                if( substr( $args[0], 0, 1 ) == '/' )
                {
                        $paths[0] = '/' . $paths[0];
                }
                return join('/', $paths);
        }

}

?>