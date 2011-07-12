<?php

namespace sakiv\framework\core;

/**
 * iContext is interface for implementing the context.
 * @author sakiv
 *
 */
interface iContext {
	function getCurrent();
	function getCurrent($type);
}