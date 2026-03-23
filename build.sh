#!/bin/bash
cd "$(dirname "$0")"
rm -f wheelbase-widget.zip && zip wheelbase-widget.zip wheelbase-widget.php
echo "Built wheelbase-widget.zip"
