Installation
------------

~ Import Sql dump to your database
```
--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'Bruno Mars', 'Gotex'),
(2, 'Syahrini', 'Membahana'),
(3, 'Justin Timberlake', 'Love');
```

~ Require it via composer command
```
composer require san/san-album-pagination-with-ajax
```

~ Register to your config/application.config.php

```php
return array(
    'modules' => array(
        'AssetManager',
        'Application',
        'SanAlbumPaginationWithAjax'
        ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
            ),
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}.php')
        )
    );
```

It will automatically install ZF2 AssetManager module, no need to install manually, or move js file into public folder.

Access
------
http://yourzf2app/albumajax

