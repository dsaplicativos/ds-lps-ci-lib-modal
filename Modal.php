<?php

/**
 *
 * Class Modal
 * Responsável pela criação de modais com configurações e conteúdos dinâmicos
 *
 */
class Modal {

    /**
     * Início da estrutura do modal
     * @param int $id
     * @param int $modal_id
     * @return string
     */
    private function getModalStart($id, $modal_id = null) {
        $html = '<!-- Modal -->
                <div class="modal" id="' . ($modal_id == null ? 'modal_' : $modal_id . '_') . $id . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <!--Content-->
                        <div class="modal-content">';
        return $html;
    }

    /**
     * Cabeçalho do modal
     * @param string $title
     * @return string
     */
    private function getModalHeader($title) {
        $html = '<!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">' . $title . '</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        return $html;
    }

    /**
     * Footer do modal
     * @return string
     */
    private function getModalFooter() {
        $html = '<!--Footer-->
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-dlgreen">OK</button>
            </div>';
        return $html;
    }

    /**
     * Finalização da estrutura do modal
     * @return string
     */
    private function getModalEnd() {
        $html = '</div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Modal -->';
        return $html;
    }

    /**
     * Criação da estrutura interna do corpo do modal
     * @param $content
     * @return string
     */
    private function getModalBody($content) {
        $html = '<div class="modal-body">' .
            $content .
            '</div>';
        return $html;
    }

    /**
     * Função chamada externamente para criar o modal
     * @param int $id
     * @param string $title
     * @param string $content
     * @param bool $nofooter
     * @param int $modal_id
     * @return string
     */
    function getModalHTML($id, $title, $content, $nofooter = false, $modal_id = null) {
        $html = $this->getModalStart($id, $modal_id);
        $html .= $this->getModalHeader($title);
        $html .= $this->getModalBody($content);
        if ($nofooter == false) {
            $html .= $this->getModalFooter();
        }
        $html .= $this->getModalEnd();
        return $html;
    }

}