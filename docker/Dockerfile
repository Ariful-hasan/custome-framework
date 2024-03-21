FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev

# Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP Extensions
# RUN docker-php-ext-install zip pdo_mysql
RUN docker-php-ext-install pdo_mysql zip
RUN docker-php-ext-configure gd \
    --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

# Install Xdebug extension
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Copy composer installable
COPY ./install-composer.sh ./

# Install composer directly without script
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



# Copy php.ini
COPY ./php.ini /etc/php/8.3/fpm/php.ini

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh

# Copy existing application directory contents
COPY . /var/www

WORKDIR /var/www

# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 80
CMD ["php-fpm"]