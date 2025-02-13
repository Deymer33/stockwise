# Usar una imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql

#Habilitar modulos de apache necesario


# Copiar el código de la aplicación al contenedor
COPY ./ /var/www/html

# Establecer permisos para el directorio de la aplicación
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 (HTTP)
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]