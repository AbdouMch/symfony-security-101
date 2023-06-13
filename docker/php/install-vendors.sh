#!/bin/bash

if [ -e composer.json ]; then \
      echo "installing php dependencies"; \
      composer install --no-progress; \
fi
