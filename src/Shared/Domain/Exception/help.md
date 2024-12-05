Las excepciones de dominio extenderán a DomainException de Shared/Domain
LA idea es que las excepciones de dominio contendrán un mensaje que puede ser trasladado directamente al usuario final, ya que contendrán lógica del negocio.
Así pues este mensaje deberá quedar especificado por el frontend, que será el que especifique el idioma del mensaje.