#!/bin/sh

echo "Unpacking pre-built linux version of composer modules"

tar -xzf ./dev/artifacts/vendor.tgz -C ./app/

echo "Done"
