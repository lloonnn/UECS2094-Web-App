<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td{
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <script>
            let fragment = document.createDocumentFragment();
            let headers = ["Title", "Author", "Quantity"];

            function Book(title, author, quantity){
                this.title = title;
                this.author = author;
                this.quantity = quantity;
            };

            let library = {
                books: [
                    new Book("Anne of Green Gables", "Lucy Maud Montgomery", 2),
                    new Book("Elephant Adventure", "Willard Price", 4),
                    new Book("Jungle Book", "Collins Johnson", 3)
                ]
            };
           
            var tr =  document.createElement("tr");
            headers.forEach(header => {
                let th = document.createElement("th");
                th.textContent = header;
                tr.appendChild(th);
            })

            fragment.appendChild(tr);  
            
            library.books.forEach(book => {
                var tr =  document.createElement("tr");
                for(field in book){
                    let td = document.createElement("td");
                    td.textContent = book[field];
                    tr.appendChild(td);
                }
                fragment.appendChild(tr);
            })

            let table = document.createElement("table");
            table.appendChild(fragment);
            document.body.appendChild(table);
        </script>
    </body>
</html>