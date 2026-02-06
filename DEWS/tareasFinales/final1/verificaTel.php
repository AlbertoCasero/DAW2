<?php
function verificaTel($telefono) {
	return preg_match('/^([0-9]{9,9})|([0-9]{3,3} [0-9]{6,6})|([0-9]{3,3} [0-9]{2,2} [0-9]{2,2} [0-9]{2,2})$/', $telefono);
}
?>