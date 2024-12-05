En la capa "Service" Es el que contiene los casos de uso.
Todos los casos de uso tendrán que ser llamados usando su "Request" correspondiente

Normalmente a un caso de uso de aplicación se le llamará desde otro caso de uso de aplicación, o bien desde un "Handler", aunque enteoria podria llamarse tambien directamente desde un controller en infrastructura, pero tendria que inyectarse el caso de uso y es mejor llamar a la capa de command.

Los casos de uso que devuelvan cualquier tipo de dato lo harán mediante una response que llevara el mismo nombre del caso de uso finalizado en ...Response