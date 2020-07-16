#!/bin/sh

php app/index.php "$@" || echo "run error code: $?"
