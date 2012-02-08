<?php

namespace lib\utils;

class ModelFormatter implements \RedBean_IModelFormatter {
	public function formatModel($model) {
		return 'lib\\models\\' . ucfirst($model);
	}
}
