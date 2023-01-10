<table>
    <thead>
        <tr>
            <th>Perguntas</th>
            <th>Respostas</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faqs as $faq)
            <tr>
                <td>
                    {{ $faq->pergunta }}
                </td>
                <td>
                    {{ $faq->resposta }}
                </td>
                <td>
                    {!! Helper::getAtivoInativo($faq->ativo, true) !!}
                </td>
        @endforeach
    </tbody>
</table>
