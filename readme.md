# Joao & Maria - Simple and light breadcrumb for Codeigniter

### How to use:

* Put the file in your helper folder.

```sh
    echo joaoemaria(); -> default out put
    echo joaoemaria( 1 ); -> this will ignore first segment of url
    echo joaoemaria( array(1,4 ) ) -> this will ignore first and 4th segment for crumb 
    echo joaoemaria( 1,TRUE ); -> this will create unorder html list
    echo joaoemaria( 1,TRUE,array ( 'class'=>'test' ) ); -> can define attributes for ul list
    echo joaoemaria( null,TRUE,array( 'class'=>'test' ) ); -> this will print all segment of url in crumb
```