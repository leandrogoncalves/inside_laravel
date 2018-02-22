Inside
===================


O inside é um software fechado desenvolvido pela equipe de TI da Psychemedics.

____

## Instalação
Para efetuar edições neste software,certifique-se que possua os seguintes requisitos:

* PHP 7. ou 7.1., mas não o 7.2 (um dos pacotes está dando erro nesta versão)
* Composer
* Git
* Docker + docker compose

#### 1 - Clone o projeto 
____
```
git clone git@bitbucket.org:psychemedics001/inside.git
```

#### 2 - Inicie o Composer 
____
```
Composer install
```

#### 3 - Instale 0 NPM
____
```
npm install
```


#### 4 - Suba os 'containers' do Docker 
____
```
docker-compose up
```

#### 5 - Acesse 
____
```
http://localhost:9100
```



