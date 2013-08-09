company-hierarchy-bundle
========================

Company hierarchy management bundle for Symfony2

This bundle includes basic hierarchy for companies. Each company has an entities (production, administration, HR, ...) And for each entity, a list of employees are attached.


### Step 1: Install bundle using composer for master version.
``` js
{
    "require": {
        // ...
        "skonsoft/company-hierarchy-bundle": "dev-master"
    }
}
```

### Step 2: Register the bundle

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Skonsoft\CompanyHierarchyBundle\SkonsoftCompanyHierarchyBundle(),
    );
    // ...
}
```

### Step 3: Update your schema database
```
#Important: don't use this command in production environnement !

./app/console doctrine:schema:update --force

```

### Step 4: Find an issue ?

please create a ticket.
