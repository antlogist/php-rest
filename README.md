> The REST architectural style is designed for network-based applications, specifically client-server applications. But more than that, it is designed for Internet-scale usage, so the coupling between the user agent (client) and the origin server must be as lightweight (loose) as possible to facilitate large-scale adoption. This is achieved by creating a layer of abstraction on the server by defining resources that encapsulate entities (e.g. files) on the server and so hiding the underlying implementation details (file server, database, etc.).
> Clients can only access resources using URIs. In other words, the client requests a resource using a URI and the server responds with a representation of the resource.
> *Wikipedia*

In other words, REST is a conception of interaction between independent objects using the HTTP protocol. It includes a set of principles, recommendations for client-server applications on how to interact. Usually, the answer receives in JSON format.

API is an interface of interaction with objects. It includes a set of interaction rules covering creating, reading, updating and deleting operations.

REST API allows the app to interact with objects using REST conceptions.

The task was to develop a filter tool for the website. The filter tool must filter products depending on the user’s answers. The buyer should answer five questions to pick the best product for him.

I chose the technologies and languages to realize the project: PHP, JavaScript, Vue, Vuex, axios.