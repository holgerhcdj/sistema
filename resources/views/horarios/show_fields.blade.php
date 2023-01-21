
                        <table class="border border-info " id="tbl_horario">
                            <tr>
                                <th colspan="6"><h3 class="text-center bg-info text-white">Horario del Docente</h3></th>
                            </tr>
                            <tr>
                                <th>Hora/Día</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                            </tr>
                            <tbody>
                                @foreach($horarios as $h)
                                <?php

                                $lunes=descripcion_horario($h->lunes);
                                $martes=descripcion_horario($h->martes);
                                $miercoles=descripcion_horario($h->miercoles);
                                $jueves=descripcion_horario($h->jueves);
                                $viernes=descripcion_horario($h->viernes);

                                ?>
                                <tr>
                                <td>{{ $h->hora }}</td>
                                <td>{!! $lunes[0] !!}</td>
                                <td>{!! $martes[0] !!}</td>
                                <td>{!! $miercoles[0] !!}</td>
                                <td>{!! $jueves[0] !!}</td>
                                <td>{!! $viernes[0] !!}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
