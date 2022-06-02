

Install docker


update sail executable path

git clone



1)First Run (Setup)
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

2) rename `.env.example` to `.env`


2)To Start the containers run `sail up`
