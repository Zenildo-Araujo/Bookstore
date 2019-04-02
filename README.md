# 						Bookstore

É Uma livraria que vende 3 tipos de livros. Livros usados, livros novos e livros exclusivos.
Os livros exclusivos não têm desconto. Os livros novos têm desconto de 10% e os usados de 25%.
Um livro tem as seguintes propriedades:

- titulo - string
- autores - lista de autores
- ISBN - identificador unico do livro
- preço - float com 2 casas decimais

Para fazer o exercício instalei o __Framework Laravel__ pela **[Documentação](https://laravel.com/docs/5.8/installation)**.

#### Download Compositor - mais recente: v1.8.4

O instalador irá baixar o compositor para você e configurar sua variável de ambiente PATH para que você possa simplesmente chamar `composer`de qualquer diretório.

Faça o download e execute o **[Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)** - ele instalará a versão mais recente do compositor sempre que for executada.

#### Requisitos do Exercício

Um livro deve responder a todas as suas propriedades e quando pedido um preço, deve responder com o
preço já com o desconto aplicado.
Os livros podem ser adicionados a um cesto (basket).

Um cesto deve responder a 2 perguntas:

- Quantos livros tem no cesto?
- Qual o total a pagar com duas casas decimais?

Deve ser possivel importar um csv com um cesto. O programa deve ler esse csv e devolva o
preço final junto com a lista de livros no formato abaixo (atenção ao alinhamento à esquerda):

> € 25.00 [Exclusivo] ZAB: Introduction to Python - Guido van rossum
> € 105.00 [Usado] USY: The Art of Computer Programming - Donalth Knuth
> € 36.00 [Novo] 1AB: JavaScript: The Good Parts - Douglas Crockford
> € 105.00 [Usado] USY: The Art of Computer Programming - Donalth Knuth
> € 22.50 [Usado] AAA: The C Programming Language - Dennis M. Ritchie, Brian W. Kernighan
> € 27.00 [Novo] AAA: The C Programming Language - Dennis M. Ritchie, Brian W. Kernighan
> € 320.50 - Total

Conjunto de funcionalidades extra, opcionais ao exercicio:

- (I) um programa que aceite como parametro o nome de um ficheiro csv com o carrinho.
- (II) aceitar um parametro adicional (-displayauthors) que em vez de adicionar ao carrinho imprima
  apenas o preço/preço com o desconto aplicado, o título e os autores dos livros. Exemplo:

> € 25.00/25.00: Introduction to Python - Guido van rossum
> € 30.00/22.50: The C Programming Language - Dennis M. Ritchie, Brian W. Kernighan

- (III) Imprimir um basket com produtos agregados e quantidade. Exemplo acima:

> € 49.50 (2) AAA: The C Programming Language - Dennis M. Ritchie, Brian W. Kernighan

- (III) um programa com unit testing
- (IV) Fazer um Webservice REST numa framework MVC à escolha, com os endpoints (não é
  necessário persistir dados para um base de dados):
  - Adicionar livro ao carrinho
  - Obter o carrinho
- (V)não usar ifs