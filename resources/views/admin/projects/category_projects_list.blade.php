<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Progetto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <ul>
                            @foreach ($category->projects as $projects)
                                <li>
                                    {{ $projects->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
