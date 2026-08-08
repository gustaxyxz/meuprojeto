// ============================================================
//  METALÚRGICA OLIVEIRA — Configuração do Cliente Supabase
//  Importar este arquivo em todas as páginas que usam o banco
// ============================================================

const SUPABASE_URL = 'https://reteanxnzjwbpisafpdw.supabase.co';
const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InJldGVhbnhuemp3YnBpc2FmcGR3Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODYxOTE0NDUsImV4cCI6MjEwMTc2NzQ0NX0.Q31sh7wAj4mUksYx4QFAbkfgCKTLCM-Ypj1v-z9Wco0';

// Cria o cliente Supabase a partir do CDN
const { createClient } = supabase;
const db = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

// Helpers de formatação usados em todas as páginas
const fmt = (v) => 'R$ ' + Number(v).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
const fmtData = (d) => d ? new Date(d + 'T00:00:00').toLocaleDateString('pt-BR') : '—';

// Status badges
const statusFabricacao = {
  'Em Fabricação':       { cls: 'bg-primary',   icon: 'bi-gear-fill' },
  'No Pátio':            { cls: 'bg-warning text-dark', icon: 'bi-building' },
  'Pronto para Retirada':{ cls: 'bg-success',    icon: 'bi-check-circle-fill' },
  'Entregue':            { cls: 'bg-secondary',  icon: 'bi-truck' },
};
const statusPagamento = {
  'Pendente':  { cls: 'bg-danger',  icon: 'bi-clock-fill' },
  'Parcial':   { cls: 'bg-warning text-dark', icon: 'bi-hourglass-split' },
  'Quitado':   { cls: 'bg-success', icon: 'bi-check2-all' },
};

function badgeFab(s)  { const b=statusFabricacao[s]||{cls:'bg-secondary',icon:'bi-circle'}; return `<span class="badge ${b.cls}"><i class="bi ${b.icon} me-1"></i>${s}</span>`; }
function badgePag(s)  { const b=statusPagamento[s]||{cls:'bg-secondary',icon:'bi-circle'}; return `<span class="badge ${b.cls}"><i class="bi ${b.icon} me-1"></i>${s}</span>`; }
