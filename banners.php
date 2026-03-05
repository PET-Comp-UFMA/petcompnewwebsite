<!DOCTYPE html>
<html lang="pt-BR">


<?php 
    $title = "Banners";
    $cssFiles = ['css/banners.css'];
    $jsFiles = ['js/swiper.js'];
    include "head.php";
?>


<body>
    <main>
        <?php include('header.php') ?>
            <div class="container-header">
                <h2>Banners</h2>
                <h3>Confira os banners do PETComp</h3>
                <h4><a href="index.php">Página Inicial</a></h4>
                <h4> -> Publicações</h4>
                <h4> -> Banners</h4>
            </div>

            <div class="container-body">
                <p>Aqui você pode explorar os banners de trabalhos desenvolvidos e apresentados pelo PETComp ao longo de sua trajetória.
                Cada banner representa um capítulo da nossa história — são projetos, pesquisas, eventos e iniciativas que refletem o compromisso do grupo com o ensino, a extensão e a pesquisa em Computação.
                Nesta galeria, você encontrará produções que foram apresentadas em congressos, seminários e encontros acadêmicos, mostrando a evolução das ideias, das tecnologias e das pessoas que fazem parte do PETComp. <br><br>
                Descubra como o grupo tem contribuído para a formação de estudantes, o fortalecimento da comunidade acadêmica e o avanço do conhecimento científico na área da Computação.</p>
            </div>

            <section>
                <div class="carousel-section">
                    <div class="carousel-container">

                        <div class="swiper carousel">
                            <div class="swiper-wrapper">
                            
                                <div class="swiper-slide">
                                    <img src="./assets/banners/01.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/02.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/03.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/04.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/06.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/07.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/08.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/09.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/10.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/12.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/13.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/14.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/15.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/17.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/18.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets/banners/19.jpg" alt="">
                                </div>

                            </div>

                            <div class="swiper-controls">
                                <div class="swiper-button-prev" aria-label="Banner anterior"></div>
                                <div class="swiper-pagination"></div>
                            <div class="swiper-button-next" aria-label="Próximo banner"></div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="banner-modal" id="bannerModal">
                <span class="banner-modal-close" id="closeModal">&times;</span>
                <img class="banner-modal-img" id="modalImage" alt="Banner ampliado">
            </div>

            <section class="banner-info-section">
                <div class="info-container">

                    <div class="swiper info-carousel">
                        <div class="swiper-wrapper">

                            <!-- CARD 1 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Uma Abordagem Competitiva para Aprendizado</h3>
                                <p>Transmitir o conhecimento apropriado de um determinado conteúdo sempre é acompanhado de desafios e o maior deles é ter a garantia que os alunos realmente absorveram a matéria lecionada de forma eficaz. Em vista de tal disputa, o grupo do Programa de Educação Tutorial de Ciência da Computação (PETComp) da Universidade Federal do Maranhão (UFMA), apresenta através deste trabalho uma proposta de abordagem competitiva metodológica para estruturação de competições envolvendo temáticas presentes no curso, tais como programação, robótica e jogos com a finalidade de subsidiar práticas de ensino, pesquisa e extensão.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/01.jpg">Visualizar</button>
                                <a href="./assets/banners/01.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 2 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Antigo Banner do PETCOMP</h3>
                                <p>Apresenta a estrutura do PETComputação  na epóca, tutorados pelo Prof. Geraldo Braz Junior e contendo 12 bolsistas , mostra também os objetivos, fatos sobre o programa e o que era feito. Atividades baseadas no conceito de unir pesquisa, ensino e extensão conforme a orientação do MEC</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/02.jpg">Visualizar</button>
                                <a href="./assets/banners/02.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 3 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Planejamento da Feira de Tecnologias de Computação</h3>
                                <p>O trabalho apresenta o planejamento e a execução da Feira de Tecnologias de Computação (EAComp), organizada pelo PETComp com o objetivo de divulgar a Ciência da Computação e aproximar os novos alunos das práticas e pesquisas desenvolvidas na UFMA. O evento reúne exposições interativas, demonstrações e jogos, permitindo que o público explore de forma didática áreas como realidade virtual, algoritmos, robótica e redes de computadores. A iniciativa promove o interesse dos discentes pela área e fortalece o vínculo entre a universidade e a comunidade, mostrando como a Computação se aplica de maneira criativa e acessível ao cotidiano. Apresentado no XVII Encontro Nordestino dos Grupos PET (ENEPeT 2018), na Universidade Federal do Ceará.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/03.jpg">Visualizar</button>
                                <a href="./assets/banners/03.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 4 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>LabTour Um Guia de Incentivo à Pesquisa</h3>
                                <p>Banner apresentado na VII Jornada informática do Maranhão, trata-se de um trabalho sobre uma das atividades promovidas pelo PETComp: O Labtour, onde é feito uma análise da falta de conhecimento de muitos graduandos em relação as ofertas do curso em pesquisa e projetos. O artigo divide sua metodologia em 2 partes,  uma referente ao planejamento e a segunda sobre a execução, concluiu-se de forma unânime a opinião de que deveriam existir mais iniciativas de incentivo à pesquisa dentro do curso, entende-se também que  os resultados desse tipo de projeto são de médio a longo prazo, mas que seus impactos são fortes.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/04.jpg">Visualizar</button>
                                <a href="./assets/banners/04.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 6 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Modelo Distribuído com API REST para Gestão do Site do PET UFMA</h3>
                                <p>Este trabalho aborda deste o reprojeto do site PET UFMA até suas fazes de implementação, conforme as novas mudanças arquiteturais atribuídas à mesma. Estas vão desde a proposta de uma nova arquitetura baseada em um modelo distribuído de cooperação entre os Grupos PET, até a construção de plugins WordPress que dão suporte. Tudo isso sustentado pela premissa que consiste em dividir a responsabilidade, que hoje é de um grupo, a todos.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/06.jpg">Visualizar</button>
                                <a href="./assets/banners/06.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 7 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Análise e Sugestão Automática de Câncer de Pele com HOG e SVM </h3>
                                <p>Apresentado na VI Jornada de Informática do Maranhão (JIMI), o trabalho propõe um modelo de classificação automática de câncer de pele utilizando extração de características HOG e o classificador SVM. Com base em imagens dermatológicas, o sistema obteve bons índices de acurácia, demonstrando potencial para auxiliar no diagnóstico precoce de lesões malignas.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/07.jpg">Visualizar</button>
                                <a href="./assets/banners/07.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 8 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Plataforma Gamificada para POSCOMP e ENAD</h3>
                                <p>Testes como ENADE e POSCOMP (exame de ingresso na pós graduação do curso de computação) são constantemente realizados pelos discentes do curso, visando melhorar sua carreira profissional. Em prol de ajudar estes alunos, o Programa de Educação Tutorial de Ciência da Computação (PETComp) da Universidade Federal do Maranhão (UFMA) se propôs a construir uma plataforma gamificada denominada COMPET, cuja proposta é auxiliar os estudantes do curso e interessados nesta área de uma forma dinâmica, interativa e mais atrativa, visando melhorar seu desempenho nos respectivos exames citados através de um jogo de perguntas e respostas, na qual as perguntas foram retiradas de provas anteriores do ENADE e POSCOMP, além de questões temáticas elaboradas pelos próprios docentes da universidade.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/08.jpg">Visualizar</button>
                                <a href="./assets/banners/08.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 9 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Vetores de Descritores Localmente Agregados para o Diagnóstico de Câncer de Mama</h3>
                                <p>Pesquisadores do Laboratório de Mídias Interativas da UFMA desenvolveram um estudo sobre o uso de vetores de descritores localmente agregados para o diagnóstico de câncer de mama. O trabalho propõe uma metodologia computacional capaz de identificar padrões em imagens mamográficas, contribuindo para o aperfeiçoamento do diagnóstico precoce e para a redução da taxa de mortalidade associada à doença. Os resultados demonstram o potencial da abordagem em classificar imagens médicas com precisão, reforçando o papel da Computação aplicada à Saúde como aliada no avanço científico e tecnológico</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/09.jpg">Visualizar</button>
                                <a href="./assets/banners/09.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 10 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Metodologias alternativas no Ensino da história da Ciência da Computação</h3>
                                <p>O PETComp/UFMA desenvolveu uma proposta inovadora de ensino utilizando metodologias lúdicas para abordar a história da Ciência da Computação. O projeto resultou na criação de uma revista interativa com elementos visuais e narrativos que tornam o aprendizado mais envolvente, incentivando a curiosidade e o interesse dos estudantes pela área. A iniciativa reforça o compromisso do PETComp com práticas criativas e inclusivas de ensino, aproximando a Computação do cotidiano de forma acessível e dinâmica.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/10.jpg">Visualizar</button>
                                <a href="./assets/banners/10.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 12 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Gamificação no Ensino de uma Turma do 9º ano do Ensino Fundamental</h3>
                                <p>Descrição banner 12O estudo desenvolvido pelo PETComp/UFMA analisou a influência da gamificação no processo de ensino-aprendizagem de alunos do 9º ano do Ensino Fundamental. Utilizando a plataforma Khan Academy, a pesquisa avaliou o impacto do uso de elementos de jogo — como desafios e recompensas — no engajamento e no desempenho dos estudantes. Os resultados indicaram maior interesse e participação nas atividades, reforçando o potencial da gamificação como ferramenta pedagógica inovadora.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/12.jpg">Visualizar</button>
                                <a href="./assets/banners/12.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 13 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Modelo de Classificação Textual para Auxílio de Teleconsultorias</h3>
                                <p>O trabalho desenvolvido pelo PETComp/UFMA propôs um modelo de classificação de perguntas em teleconsultorias médicas usando técnicas de Mineração Textual e Aprendizado de Máquina. Utilizando dados reais de consultas médicas, o sistema alcançou acurácia média de 89%, mostrando potencial para automatizar a triagem de dúvidas e otimizar o suporte em plataformas de teleconsultoria.</p>
 
                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/13.jpg">Visualizar</button>
                                <a href="./assets/banners/13.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 14 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>PET Vitae: Ferramenta de Gestão de Grupos PET</h3>
                                <p>O trabalho desenvolvido pelo PETComp/UFMA propôs um modelo de classificação de perguntas em teleconsultorias médicas usando técnicas de Mineração Textual e Aprendizado de Máquina. Utilizando dados reais de consultas médicas, o sistema alcançou acurácia média de 89%, mostrando potencial para automatizar a triagem de dúvidas e otimizar o suporte em plataformas de teleconsultoria.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/14.jpg">Visualizar</button>
                                <a href="./assets/banners/14.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 15 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Um Algoritmo Genético com Chaves Aleatórias Viciadas aplicada ao Problema da Clique Máxima</h3>
                                <p>Desenvolvido no EACOMP pela equipe do PETComp/UFMA, o trabalho apresenta uma abordagem baseada em meta-heurísticas e programação linear para resolver o problema da clique máxima, conhecido na área de Pesquisa Operacional. A solução combina o uso do solver Gurobi com o algoritmo BRKGA, obtendo resultados eficientes e demonstrando o potencial dos algoritmos genéticos em problemas de otimização complexos.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/15.jpg">Visualizar</button>
                                <a href="./assets/banners/15.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 17 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Reformulação da Interface do WhatsApp Considerando o Usuário da Terceira Idade</h3>
                                <p>Apresentado na VII Jornada de Informática do Maranhão (JIMI), o trabalho propõe uma nova interface do WhatsApp adaptada às necessidades de idosos, com foco em acessibilidade, clareza e usabilidade. Após testes comparativos entre a versão original e o protótipo reformulado, observou-se maior facilidade de uso e melhor desempenho entre os participantes da terceira idade, destacando a importância do design inclusivo em aplicativos de comunicação.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/17.jpg">Visualizar</button>
                                <a href="./assets/banners/17.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 18 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Dashboards para Apresentação de Resultados de Projetos de Pesquisa Educacionais</h3>
                                <p>O acompanhamento dos resultados de projetos de pesquisa educacionais é essencial para garantir transparência, qualidade e controle do desempenho. No entanto, muitas vezes os dados são apresentados de forma estática e pouco eficiente, dificultando a análise e a personalização das informações. Nesse contexto, dashboards surgem como ferramentas visuais interativas que organizam dados por meio de indicadores e gráficos, facilitando a compreensão e apoiando a tomada de decisões. Este artigo apresenta o desenvolvimento de um modelo de dashboard voltado para projetos de pesquisa na área educacional, incluindo a criação de uma planilha automatizada para extração de dados, o desenvolvimento do sistema que hospeda o painel e a validação da solução junto ao cliente. O sistema foi testado com dados fictícios, podendo ser adaptado futuramente para diferentes contextos de pesquisa.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/18.jpg">Visualizar</button>
                                <a href="./assets/banners/18.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 19 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Apresentação do PETComp</h3>
                                <p>O Programa de Educação Tutorial de Ciência da Computação (PETComp) da UFMA promove a formação completa dos estudantes por meio da integração entre ensino, pesquisa e extensão. Criado em 2007, o grupo desenvolve projetos que unem tecnologia e impacto social, como o Site PETComp e o EACOMP, além de realizar minicursos, monitorias, fábrica de software, Acalourada, PodComp e outros eventos científicos. Com pesquisas em Processamento de Imagem, Engenharia de Software, Aprendizado de Máquina e Inovação no Ensino, o PETComp estimula o pensamento crítico e a criação de soluções tecnológicas para a sociedade. Mais do que um grupo, o PETComp é um espaço de inovação, colaboração e crescimento acadêmico.</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/19.jpg">Visualizar</button>
                                <a href="./assets/banners/19.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        <?php include('footer.php') ?>
        <script src="./js/js.js"></script>
    </main>
</body>

</html>