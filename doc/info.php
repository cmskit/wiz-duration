<?php
$config = <<<EOD
{
	"info":  {
		"name": "Duration-Editor",
		"description": {
			"en": "edit Duration-Infos semantically",
			"de": "Dauer semantisch bearbeiten"
		},
		"io":  [
			"seconds",
			"seconds"
		],
		"authors":  ["Christoph Taubmann"],
		"homepage": "http://cms-kit.org",
		"mail": "info@cms-kit.org",
		"copyright": "MIT"
	},
	"system":  {
		"version": 0.8,
		"inputs":  [
			"INTEGER"
		],
		"include":  ["wizard:duration\\nshow:years,months,days,hours,minutes"],
		"translations":  [
			"en"
		]
	}
}
EOD;
?>
