FROM php:7.4-apache

RUN apt-get update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \
    -y --no-install-recommends

RUN docker-php-ext-install mysqli


#COPY ./install-composer ./

# COPY ./php.ini /usr/local/etc/php/

#RUN apt-get purge -y g++ \
  #  && apt-get autoremove -y \
  #  && rm -r /varl/lib/apt/lists/* \
   # && rm -rf /tmp/* \
  #  && sh ./install-composer.sh \
 #   && rm ./install-composer.sh

# WORKDIR /var/www

COPY ./ /var/www/html

CMD ["apache2-foreground"]

