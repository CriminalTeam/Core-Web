<?php
class controllerIndexBox extends modelIndexBox
{
    /**
     *
     * @var string
     * <pre>
     *      Setar a classe de visualização!
     * </pre>
     */
    private $boxView;
    
    /**
     * função contrutor
     */
    public function __construct ()
    {
        parent::__construct();
        
        #Globalizando as congirações
        global $config;
        
        #Setando a camada view
        $this->boxView  =   new viewIndexBox ();
        
        #Chamando o stado do servidor
        $this->serverStatus ();
        
        #Top Ranking
        $this->topRanking ();
        
        #Login
        if (isset ($_POST['submit']))
        {
            $lgn = $this->boxLogin ($_POST['userid'], $_POST['pasw']);
            if ($lgn != 1)
            {
                showMsg("Erro no login", $lgn );
            }
        }
        
        #desconnect
        if (isset ($_GET['sair']))
        {
            session_destroy ();
            redir("index.php");
        }
    }
    
    private function serverStatus ()
    {
        if ($this->estadoServidor ($config["MATCH_SERVER"]["MATCH_IP"], $config["MATCH_SERVER"]["NATCH_PORT"] ) == true)
        {
            $retorno = "online";
        }
        else
        {
            $retorno = "offline";
        }
        
        $this->boxView->nVar ("serverStatus", sprintf ("<li>Estado do Servidor: <strong class='%s'>%s</strong></li>", $retorno, $retorno));
        $this->boxView->nVar ("onlinePlayers", sprintf("<li>Jogadores Online: <strong>%d</strong></li>", $this->jogadoresOnline()));
        $this->boxView->nVar ("contasTotal", sprintf("<li>Total de Contas: <strong>%d</strong></li>", $this->totalContas ()));
        $this->boxView->nVar ("personagensTotal", sprintf("<li>Total de Character's: <strong>%d</strong></li>", $this->totalPersonagem()));
        $this->boxView->nVar ("recordeOnline", sprintf("<li>Record Online: <strong>%d</strong></li>", $this->recordOnline()));
    }
    
    public function topRanking()
    {
        #TOP PLAYERS
        $resRanking = $this->topPlayerRanking();
        for($i = 0; $i < count($resRanking[0]); $i++)
        {
            $nomes[] = $resRanking[0][$i];
            $cid[]   = $resRanking[1][$i];
        }
        
        $this->boxView->nVar ("playerTopRR", $nomes);
        $this->boxView->nVar ("playerTopRRCID", $cid);
                
        #TOP CLAN
        $resRankingC = $this->topClanRanking();
        for($x = 0; $x < count($resRankingC[0]); $x++)
        {
            $nomesC[] = $resRankingC[0][$x];
            $clid[]   = $resRankingC[1][$x];
        }
        
        $this->boxView->nVar ("playerTopRRC", $nomesC);
        $this->boxView->nVar ("playerTopRRCLID", $clid);    
    }
}

new controllerIndexBox ();
?>