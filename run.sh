#!/bin/sh

php app/index.php run "$@" || echo "run error code: $?"
