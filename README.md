# Ocean Modeling Forum
The Ocean Modeling Forum website.

Author: [Darin Reid](http://elcontraption.com/)

1. [Development](#development)

## Development

### 1. Clone this repository locally.

### 2. Update local environment config settings
Make a copy of `env-example.php` and update the variables within to match your local development environment.

```
cp env-example.php env.php
```

** Important**: Make sure you generate new WordPress auth keys within that file.

### 3. Install theme dependencies

```
cd wp-content/themes/omf
composer install
npm install
```

### 4. Run gulp tasks

```
gulp
```

## Deployment
//...
